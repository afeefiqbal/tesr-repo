@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}} Page SEO Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$type}} page seo details</li>
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
                        <h3 class="card-title">Tag Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">{{ isset($tag)?$tag->meta_title:'' }}</textarea>
                                
                            </div>
                            <div class="form-group col-md-6">
                            <label> Meta Description</label>
                          <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">{{ isset($tag)?$tag->meta_description:'' }}</textarea>
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword">{{ isset($tag)?$tag->meta_keyword:'' }}</textarea>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag" placeholder="Other Meta Tag">{{ isset($tag)?$tag->other_meta_tag:'' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="id" id="id" value="{{ isset($tag)?$tag->id:'0' }}">
                        <input type="hidden" name="page_name" id="page_name" value="{{ $type }}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
   
@endsection