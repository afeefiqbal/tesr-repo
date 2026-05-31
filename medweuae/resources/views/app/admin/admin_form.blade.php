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
              <li class="breadcrumb-item"><a href="{{url(sitePrefix().'administration')}}">Admin list</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        
          @foreach ($errors->all() as $error)
              <span class="invalid-feedback" role="alert" style="padding: 10px;text-align: center;"><strong>{{ $error }}</strong></span>
          @endforeach
        
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
                  <label for="inputPassword4">Name*</label>
                  <input type="text" class="form-control required" name="name" placeholder="Name" id="name" value="{{ isset($admin)?@$admin->name:old('name') }}" maxlength="255">
                  <div class="help-block with-errors" id="name_error"></div>
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Email*</label>
                  <input type="email" name="email_id" id="admin_email_id" placeholder="Email ID" class="form-control required" autocomplete="off" value="{{ isset($admin)?@$admin->email:old('email_id') }}" maxlength="50">
                  <div class="help-block with-errors" id="admin_email_id_error"></div>
                  @error('email_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Profile Image</label>
                <div class="file-loading">
                    <input id="profile_image" name="profile_image" type="file">
                </div>
                <span class="caption_note">Note: Image size must be 300 X 300</span>
              </div>
              <div class="form-group col-md-6">
                  <label>Phone Number*</label>
                  <input type="number" class="form-control required" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ isset($admin)?@$admin->phone_number:old('phone_number') }}" maxlength="15">
                  <div class="help-block with-errors" id="phone_number_error"></div>
                  @error('phone_number')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Authentication Credentials</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Username*</label>
                  <input type="text" class="form-control required" id="username" name="username" placeholder="Username" value="{{ isset($admin)?@$admin->username:old('username') }}" maxlength="30">
                  <div class="help-block with-errors" id="username_error"></div>
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              @if(!isset($admin))
                <div class="form-group col-md-6">
                  <label>Password*</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="login_password" name="password" placeholder="Password" min="8" maxlength="20">
                    <div class="input-group-append">
                      <span class="input-group-text pointer-cls" id="refresh_code"><i class="fas fa-sync"></i></span>
                    </div>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              @endif
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
    $("#profile_image").fileinput({
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
        minImageWidth: 300,
        minImageHeight: 300,
        maxImageWidth: 300,
        maxImageHeight: 300,
        showRemove: true,
        @if(isset($admin) && $admin->profile_image!=NULL)
          initialPreview: ["{{asset($admin->profile_image)}}",],
          initialPreviewConfig: [{
              caption: "{{ ($admin->profile_image!=NULL)?$admin->profile_image:''}}",
              width: "120px",
              key: "{{($admin->profile_image)}}",
          }]
        @endif
    });
});
</script>      
@endsection