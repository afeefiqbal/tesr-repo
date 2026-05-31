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
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'blog')}}">Blog</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Blog Form</h3>
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
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required for_canonical_url" autocomplete="off"  value="{{ isset($blog)?$blog->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
			                <div class="form-group col-md-6">
                                <label>Canonical URL*</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Canonical URL" class="form-control required" autocomplete="off" value="{{ isset($blog)?$blog->short_url:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label> List Description*</label>
                                <textarea class="form-control tinyeditor required" id="list_description"  name="list_description" placeholder="Description">{{ isset($blog)?$blog->list_description:'' }}</textarea>
                                <div class="help-block with-errors" id="list_description_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Description*</label>
                            	<textarea class="form-control tinyeditor required" id="description"  name="description" placeholder="Description">{{ isset($blog)?$blog->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>    
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label> Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 840 x 511</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label> Image Attribute</label>
                                <input type="text" name="image_meta_tag" id="image_meta_tag" placeholder="Alt='Banner Attribute'" class="form-control placeholder-cls" autocomplete="off"  value="{{ isset($blog)?$blog->image_meta_tag:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-4">
                                <label> Posted date *</label>
                                <input type="date" name="posted_date" id="posted_date" placeholder="Posted Date" class="form-control required" autocomplete="off"  value="{{ isset($blog)?$blog->posted_date:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="posted_date_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label> Author *</label>
                                <input type="text" name="author" id="author" placeholder="Author" class="form-control required" autocomplete="off"  value="{{ isset($blog)?$blog->author:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="author_error"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Banner</label>
                                <div class="file-loading">
                                    <input id="banner" name="banner" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 1920 X 450</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Banner Attribute</label>
                                <input type="text" name="banner_attribute" id="banner_attribute" placeholder="alt='alt Image'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($blog)?$blog->banner_attribute:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="banner_attribute_error"></div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">{{ isset($blog)?$blog->meta_title:'' }}</textarea>
                            </div>
							<div class="form-group col-md-6">
                                <label> Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">{{ isset($blog)?$blog->meta_description:'' }}</textarea>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
								<textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword">{{ isset($blog)?$blog->meta_keyword:'' }}</textarea>
                            </div>
							<div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
								<textarea class="form-control" id="other_meta_tag" name="other_meta_tag" placeholder="Other Meta Tag">{{ isset($blog)?$blog->other_meta_tag:'' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 840,
        minImageHeight: 511,
        maxImageWidth: 840,
        maxImageHeight: 511,
        showRemove: true,
        @if(isset($blog) && $blog->image!=NULL)
            initialPreview: [
                "{{asset($blog->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($blog->image!=NULL)?$blog->title:'';}}", width: "120px"}
            ]
        @endif
    });

    $("#banner").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        initialPreviewShowDelete: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,       
        minImageWidth: 1920,
        minImageHeight: 450,
        maxImageWidth: 1920,
        maxImageHeight: 450,
        <?php if(isset($blog) && $blog->banner!=NULL){?>
            initialPreview: ["{{asset($blog->banner)}}"],
            initialPreviewConfig: [{
                caption: "{{ ($blog->banner!=NULL)?$blog->banner_title:''}}",
                width: "120px",
                key: "{{($blog->banner)}}",
            }]
        <?php }?>
    });
});
</script>      
@endsection