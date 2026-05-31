@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">About-us</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
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
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">About-us Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>                        
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Short Title</label>
                                <input type="text" name="short_title" id="short_title" placeholder="Short Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->short_title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="short_title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required" autocomplete="off" value="{{ isset($about)?$about->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Home Description*</label>
                                <textarea name="home_description" id="home_description" class="form-control tinyeditor required" placeholder="Home Description">{{ isset($about)?$about->home_description:'' }}</textarea>
                                <div class="help-block with-errors" id="home_description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Description*</label>
                                <textarea name="description" id="description" class="form-control tinyeditor required" placeholder="Description">{{ isset($about)?$about->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Home Image*</label>
                                <div class="file-loading">
                                    <input id="home_image" name="home_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 552 X 552</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Home Image Attribute *</label>
                                <input type="text" class="form-control placeholder-cls" id="home_image_attribute" name="home_image_attribute" placeholder="Alt='Home Image Attribute'" value="{{ isset($about)?$about->home_image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Inner Image*</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 552 X 538</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Inner Image Attribute *</label>
                                <input type="text" class="form-control placeholder-cls" id="image_attribute" name="image_attribute" placeholder="Alt='Image Attribute'" value="{{ isset($about)?$about->image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission Title</label>
                                <input type="text" name="mission_title" id="mission_title" placeholder="Mission Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->mission_title:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision Title</label>
                                <input type="text" name="vision_title" id="vision_title" placeholder="Vision Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->vision_title:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission</label>
                                <textarea name="mission" id="mission" placeholder="Mission" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($about)?$about->mission:'' }}</textarea>
                                <div class="help-block with-errors" id="mission_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision</label>
                                <textarea name="vision" id="vision" placeholder="Vision" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($about)?$about->vision:'' }}</textarea>
                                <div class="help-block with-errors" id="vision_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission Image*</label>
                                <div class="file-loading">
                                    <input id="mission_image" name="mission_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 63 X 63</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision Image*</label>
                                <div class="file-loading">
                                    <input id="vision_image" name="vision_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 63 X 63</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls" id="mission_image_meta_tag" name="mission_image_meta_tag" placeholder="Alt='Mission Image Attribute'" value="{{ isset($about)?$about->mission_image_meta_tag:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls" id="vision_image_meta_tag" name="vision_image_meta_tag" placeholder="Alt='Vision Image Attribute'" value="{{ isset($about)?$about->vision_image_meta_tag:'' }}" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id" id="id" value="{{isset($about)?$about->id:'0'}}">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">  
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
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: true, 
        allowedFileTypes: ['image'],
        minImageWidth: 552,
        minImageHeight: 538,
        maxImageWidth: 552,
        maxImageHeight: 538,
        showRemove: true,
        @if(isset($about) && $about->image!=NULL)
            initialPreview: [
                "{{asset($about->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->image!=NULL)?$about->title:'';!!}", width: "120px"}
            ]
        @endif
    });

    $("#home_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: true, 
        allowedFileTypes: ['image'],
        minImageWidth: 552,
        minImageHeight: 552,
        maxImageWidth: 552,
        maxImageHeight: 552,
        showRemove: true,
        @if(isset($about) && $about->home_image!=NULL)
            initialPreview: [
                "{{asset($about->home_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->home_image!=NULL)?$about->title:'';!!}", width: "120px"}
            ]
        @endif
    });

    $("#mission_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 75,
        minImageHeight: 75,
        maxImageWidth: 75,
        maxImageHeight: 75,
        showRemove: true,
        @if(isset($about) && $about->mission_image!=NULL)
            initialPreview: [
                "{{asset($about->mission_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->mission_image!=NULL)?$about->title:'';!!}", width: "120px"},
            ]
        @endif
    });
    $("#vision_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 75,
        minImageHeight: 75,
        maxImageWidth: 75,
        maxImageHeight: 75,
        showRemove: true,
        @if(isset($about) && $about->vision_image!=NULL)
            initialPreview: [
                "{{asset($about->vision_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->vision_image!=NULL)?$about->title:'';!!}", width: "120px"},
            ]
        @endif
    });
});
</script>       
@endsection