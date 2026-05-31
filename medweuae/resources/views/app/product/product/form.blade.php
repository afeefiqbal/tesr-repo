@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'product/')}}">Product</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Product Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" user_type="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" user_type="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required for_canonical_url" autocomplete="off"  value="{{ isset($product)?$product->title:'' }}">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Short URL *</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Short URL" class="form-control required" autocomplete="off"  value="{{ isset($product)?$product->short_url:'' }}">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Category*</label>
                                <select name="category_id" id="category_id" class="form-control select2 required">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ (@$category->id==@$product->category_id)?'selected':'' }}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="category_id_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Home Description*</label>
                                <textarea name="home_description" id="home_description" placeholder="Description" class="form-control tinyeditor required" autocomplete="off">{{ isset($product)?$product->home_description:'' }}</textarea>
                                <div class="help-block with-errors" id="home_description_error"></div>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label> Description*</label>
                                <textarea name="description" id="description" placeholder="Description" class="form-control tinyeditor required" autocomplete="off">{{ isset($product)?$product->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Detail Description</label>
                                <textarea name="alternate_description" id="alternate_description" placeholder="Detail Description" class="form-control tinyeditor" autocomplete="off">{{ isset($product)?$product->alternate_description:'' }}</textarea>
                                <div class="help-block with-errors" id="alternate_description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Price</label>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" autocomplete="off"  value="{{ isset($product)?$product->price:'' }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Brand</label>
                                <select name="brand" id="brand" class="form-control select2 required">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{ (@$brand->id==@$product->brand)?'selected':'' }}>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--<div class="form-group col-md-4">
                                <label> Availability</label>
                                <input type="text" name="availablity" id="availablity" placeholder="Availability" class="form-control" autocomplete="off"  value="{{ isset($product)?$product->availablity:'' }}">
                            </div>-->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Thumbnail Image</label>
                                <div class="file-loading">
                                    <input id="thumbnail_image" name="thumbnail_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size should be minimum of 155 X 134</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Thumbnail Image Attribute</label>
                                <input type="text" name="thumbnail_image_attribute" id="thumbnail_image_attribute" placeholder="alt='alt Image'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($product)?$product->thumbnail_image_attribute:'' }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Banner</label>
                                <div class="file-loading">
                                    <input id="banner" name="banner" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size should be minimum of 1920 X 450</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Banner Attribute</label>
                                <input type="text" name="banner_attribute" id="banner_attribute" placeholder="alt='alt Image'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($product)?$product->banner_attribute:'' }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Brochure</label>
                                <div class="file-loading">
                                    <input id="brochure" name="brochure" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">{{ isset($product)?$product->meta_title:'' }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">{{ isset($product)?$product->meta_description:'' }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword">{{ isset($product)?$product->meta_keyword:'' }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag" placeholder="Other Meta Tag">{{ isset($product)?$product->other_meta_tag:'' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="{{isset($product)?$product->id:''}}" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="{{ isset($product)?$product->id:'0' }}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#thumbnail_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,       
        minImageWidth: 155,
        minImageHeight: 134,
        maxImageWidth: 155,
        maxImageHeight: 134,
        <?php if(isset($product) && $product->thumbnail_image!=NULL){?>
            initialPreview: ["{{asset($product->thumbnail_image)}}"],
            initialPreviewConfig: [{
                caption: "{{ ($product->banner!=NULL)?$product->title:''}}",
                width: "120px",
                key: "{{($product->thumbnail_image)}}",
            }]
        <?php }?>
    });
    $("#banner").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,       
        minImageWidth: 1920,
        minImageHeight: 450,
        maxImageWidth: 1920,
        maxImageHeight: 450,
        <?php if(isset($product) && $product->banner!=NULL){?>
            initialPreview: ["{{asset($product->banner)}}"],
            initialPreviewConfig: [{
                caption: "{{ ($product->banner!=NULL)?$product->title:''}}",
                width: "120px",
                key: "{{($product->banner)}}",
            }]
        <?php }?>
    });
    
    $("#brochure").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,
        <?php if(isset($product) && $product->brochure!=NULL){?>
            initialPreview: ["{{asset($product->brochure)}}"],
            initialPreviewConfig: [{
                caption: "{{ ($product->brochure!=NULL)?$product->title:''}}",
                width: "120px",
                key: "{{($product->brochure)}}",
            }],
            initialPreviewConfig: [
                {type: "pdf", description: "<h5>PDF File</h5> This is a representative description number ten for this file.", size: 8000, caption: "{{$product->title}}", url: "{{asset($product->brochure)}}", key: 10, downloadUrl: false}, // disable download
            ],
        <?php }?>
    });
});
</script>      
@endsection