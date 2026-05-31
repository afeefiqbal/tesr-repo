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
                      <li class="breadcrumb-item"><a href="{{url(sitePrefix().'home/testimonial')}}">Testimonials List</a></li>
                      <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"method="post">
                {{csrf_field()}}
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Basic Informations</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
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
                            <label for="title">Name</label>
                            <input type="text" name="title" id="title" placeholder="Title" class="form-control required" autocomplete="off" value="{{ isset($testimonial)?$testimonial->title:'' }}" maxlength="235">
                            <div class="help-block with-errors" id="title_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">Designation*</label>
                            <input type="text" name="designation" id="designation" placeholder="Desgination" class="form-control required" autocomplete="off" value="{{ isset($testimonial)?$testimonial->designation:'' }}" maxlength="235">
                            <div class="help-block with-errors" id="designation_error"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Message*</label>
                            <textarea class="form-control tinyeditor required" id="message" name="message">{!! isset($testimonial)?$testimonial->message:'' !!}</textarea>
                            <div class="help-block with-errors" id="message_error"></div>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="image">Image*</label>
                            <div class="file-loading">
                                <input id="image" name="image" type="file" accept="image/*">
                            </div>
                            <span class="caption_note">Note: Image size must be 72 x 72</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image_meta_tag">Image Meta Tag*</label>
                            <input type="text" name="image_meta_tag" id="image_meta_tag" placeholder="Image Alternate Text" class="form-control required placeholder-cls" required autocomplete="off"value="{{ isset($testimonial)?$testimonial->image_meta_tag:'' }}" maxlength="255">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-primary pull-left submitBtn" value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                        </div>
                    </div>
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
        minImageWidth: 72,
        minImageHeight: 72,
        maxImageWidth: 72,
        maxImageHeight: 72,
        showRemove: true,
        @if(isset($testimonial) && $testimonial->image!=NULL)
          initialPreview: ["{{asset($testimonial->image)}}",],
          initialPreviewConfig: [{
              caption: "{{ ($testimonial->image!=NULL)?$testimonial->title:''}}",
              width: "120px",
              key: "{{($testimonial->image)}}",
          }]
        @endif
    });
});
</script> 
@endsection