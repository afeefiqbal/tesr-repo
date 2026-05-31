@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-user-shield"></i> {{$type}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url(sitePrefix().'product/category')}}">Category</a></li>
              @if($id!=NULL)
                <li class="breadcrumb-item"><a href="{{url(sitePrefix().'product/sub-category/'.$id)}}">Sub-categories</a></li>
              @endif
              <li class="breadcrumb-item active">{{$key}}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        @if($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" user_type="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{$error}}
            </div>
          @endforeach  
        @endif
        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
        {{csrf_field()}}          
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Basic Informations</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label> Title*</label>
                  <input type="text" name="title" id="title" placeholder="Title" class="form-control for_canonical_url required" autocomplete="off" value="{{ @$category->title }}">
                  <div class="help-block with-errors" id="title_error"></div>
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                  <label> Short URL*</label>
                  <input type="text" name="short_url" id="short_url" placeholder="Short URL" class="form-control required" autocomplete="off" value="{{ @$category->short_url }}">
                  <div class="help-block with-errors" id="short_url_error"></div>
                  @error('short_url')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
            </div>
          </div>
          <div class="card-footer">
            <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
            <input type="hidden" name="parent_id" id="parent_id" value="{{$id}}">
            <button type="reset" class="btn btn-default">Cancel</button>
            <img class="animation__shake loadingImg" src="{{asset('app/dist/img/loading.gif')}}" style="display:none;">
          </div>
        </div>
      </form>
    </section>  
</div>
@endsection