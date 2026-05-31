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
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'product/item')}}">Project</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('error') }}
                </div>
            @endif
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Gallery Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Image*</label>
                                <div class="file-loading">
                                    <input id="images" name="images[]" multiple type="file">
                                </div>
                                <span class="caption_note">Note: Image size should be minimum of 465 x 402</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
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
    $("#images").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        dropZoneEnabled: false,
        showRemove: true,
        removeLabel: "Reset",
        initialPreviewAsData: true,
        allowedFileTypes: ['image'],
        minImageWidth: 465,
        minImageHeight: 402,
        maxImageWidth: 465,
        maxImageHeight: 402,
        initialPreview: [
            @if(isset($files)&&$files)
              @foreach($files as $file)
                 "{{asset($file->image)}}",
              @endforeach
            @endif
        ],
        initialPreviewConfig: [
            @if(isset($files)&&$files)
                @php $i=1@endphp
                @foreach($files as $file)
                   {type: "image", description: "Images", size: 8000, caption: "Gallery Image-{{$i}}", key: '{{asset($file->image)}}', url: "{{url(sitePrefix().'product/item/gallery/delete/'.$file->id)}}", downloadUrl: false},
                @php $i++ @endphp   
                @endforeach
            @endif
        ]
    }).on('filebeforedelete', function() {
        var aborted = !window.confirm('Are you sure you want to delete this file?');
        if (aborted) {
            window.alert('File deletion was aborted! ' + krajeeGetCount('file-5'));
        };
        return aborted;
    }).on('filedeleted', function() {
        setTimeout(function() {
            window.alert('File deletion was successful! ' + krajeeGetCount('file-5'));
        }, 900);
    });
});
</script>      
@endsection