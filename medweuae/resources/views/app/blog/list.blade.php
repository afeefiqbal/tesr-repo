@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Blog List</li>
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
		                	<a href="{{url(sitePrefix().'blog/create')}}" class="btn btn-success pull-right">Add Blog <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                            <table id="recordsListView" class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Posted Date</th>
                                        <th>Status </th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1@endphp
                                    @foreach($blogList as $blog)
                                        <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->posted_date }}</td>
                                        <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini" title="Blog" ref="<?php echo $blog->id;?>" <?php if($blog->status=="Active"){ ?>checked="checked"<?php }?>></td>
                                        <td>{{ date("d-M-Y", strtotime($blog->created_at))  }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(sitePrefix().'blog/edit/'.$blog->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Blog"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Blog" data-url="blog/delete" data-id="{{$blog->id}}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                        </tr>
                                    @php $i++@endphp
                                    @endforeach
                                </tbody>
                            </table>
              	</div>
            </div>
        </div>
    </section>
</div>    
@endsection
