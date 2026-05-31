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
                        <li class="breadcrumb-item active">{{$title}}</li>
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
                        <h3 class="card-title">{{ $key }} Banner - {{ $type }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Banner Title*</label>
                                <input type="text" class="form-control required" name="title" placeholder="Banner Title" id="title" value="{{ isset($banner)?$banner->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Banner*</label>
                                <div class="file-loading">
                                    <input id="banner" name="banner" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 1920 X 450</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Banner Attribute*</label>
                                <input type="text" name="banner_meta_tag" id="banner_meta_tag" placeholder="alt='alt Image'" class="form-control required placeholder-cls" required autocomplete="off" value="{{ isset($banner)?$banner->banner_meta_tag:'' }}">
                                <div class="help-block with-errors" id="banner_meta_tag_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id" id="id" value="{{ isset($banner)?$banner->id:'0' }}">
                        <input type="hidden" name="type" id="type" value="{{ $type }}">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">  
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#banner").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: true, 
        showRemove: true,       
        minImageWidth: 1920,
        minImageHeight: 450,
        maxImageWidth: 1920,
        maxImageHeight: 450,
        <?php if(isset($banner) && $banner->banner!=NULL){?>
            initialPreview: ["{{asset($banner->banner)}}"],
            initialPreviewConfig: [{
                caption: "{{ ($banner->banner!=NULL)?$banner->title:''}}",
                width: "120px",
                key: "{{($banner->banner)}}",
            }]
        <?php }?>
    });
});
</script>      
@endsection