@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="nav-icon fas fa-tachometer-alt"></i> Admin Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-5">
            <div class="row">
                <img src="{{asset('app/dist/img/logo.png')}}" style="height: 200px;">
            </div>            
        </div>
      </div>
    </section>
</div>
@endsection
