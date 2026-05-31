@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-user-shield"></i> Manage Administration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Administration</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
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
          			<div class="card card-success card-outline">
		              	<div class="card-header">
		                	<a href="{{url(sitePrefix().'administration/create')}}" class="btn btn-success pull-right">Add Admin <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                			<table class="dataTable table table-bordered table-striped">
                  				<thead>
				                    <tr>
				                        <th>#</th>
				                        <th>Name</th>
				                        <th>Email</th>
				                        <th>Username</th>
				                        <th>Phone Number</th>
				                        <th>Status</th>
				                        <th>Created Date</th>
				                        <th class="not-sortable">Actions</th>
				                    </tr>
				                	</thead>
				                	<tbody>
				                   @php $i=1 @endphp @foreach($adminList as $user)
				                        <tr>
				                            <td>{{ $i }}</td>
				                            <td>{{ $user->name}}</td>
				                            <td>{{ $user->email}}</td>
				                            <td>{{ $user->username}}</td>
				                            <td>{{ $user->phone_number }}</td>
				                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini" title="Admin" ref="{{ $user->id}}" <?php if($user->status=="Active"){ ?>checked="checked"<?php }?>></td>
				                            <td>{{ date("d-M-Y", strtotime($user->created_at))  }}</td>
				                            <td class="text-right py-0 align-middle">
								                      <div class="btn-group btn-group-sm">
								                        <a href="{{url(sitePrefix().'administration/edit/'.$user->id)}}" class="btn btn-success mr-2 tooltips" title="Edit {{$user->role}}"><i class="fas fa-edit"></i></a>
								                        @if($user->id!=1)
								                        	<a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="administration/delete" data-id="{{$user->id}}" title="Delete {{$user->role}}"><i class="fas fa-trash"></i></a>
								                        @endif
								                        <!-- <a href="{{url(sitePrefix().'reset-password/'.$user->id)}}" class="btn btn-primary mr-2 tooltips" title="Reset Password {{$user->role}}"><i class="fas fa-unlock"></i></a> -->
								                      </div>
								                    </td>
				                        </tr>
				                    @php $i++;@endphp@endforeach
				                	</tbody>
                			</table>
              			</div>
            		</div>
          		</div>
          	</div>
        </div>
    </section>
</div>    
@endsection