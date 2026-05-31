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
              @if($id==NULL)
                <li class="breadcrumb-item active">{{$type}}</li>
              @else
                <li class="breadcrumb-item"><a href="{{url(sitePrefix().'product/category/')}}">Categories</a></li>
                <li class="breadcrumb-item active">{{$type}}</li>
              @endif
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
          			@if (session('message'))
		              <div class="alert alert-success" role="alert">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                {{ session('message') }}
		              </div>
		            @elseif(session('error'))
		              <div class="alert alert-danger" role="alert">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                {{ session('message') }}
		              </div>
		            @endif
          			<div class="card card-success card-outline">
		              	<div class="card-header">
                      <a href="{{url(sitePrefix().'product/'.strtolower($type).'/create/'.$id)}}" class="btn btn-success pull-right">Add {{$type}} <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                      </a>
		              	</div>
              			<div class="card-body">
                			<table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                @if($id==NULL)
                                  <th>Sub-category</th>
                                @endif
                                <th>Status </th>
                                <th>Created Date</th>
                                <th class="not-sortable">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1@endphp@foreach($categoryList as $category)
                                <tr>
                                    <td>
                                      {{ $i }}
                                    </td>
                                    <td>
                                      {{ $category->title }}
                                    </td>
                                    @if($id==NULL)
                                      <td>
                                        <a href="{{url(sitePrefix().'product/sub-category/'.$category->id)}}" class="btn btn-sm btn-primary mr-2 tooltips" title="Add {{$type}}">Sub-category</a>
                                      </td>
                                    @endif
                                    <td>
                                      <input type="checkbox" class="status_check" {{($category->status=="Active")?'checked':''}} title="PortfolioCategory" ref="{{ $category->id}}">
                                    </td>
                                    <td>
                                      {{ date("d-M-Y", strtotime($category->created_at))  }}
                                    </td>
                                    <td class="text-right py-0 align-middle">
                                      <div class="btn-group btn-group-sm">
                                        <a href="{{url(sitePrefix().'product/'.strtolower($type).'/edit/'.$category->id)}}" class="btn btn-success mr-2 tooltips" title="Edit {{$type}}"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="product/{{strtolower($type)}}/delete" data-id="{{$category->id}}" title="Delete {{$type}}"><i class="fas fa-trash"></i></a>
                                      </div>
                                    </td>
                                </tr>
                            @php $i++@endphp@endforeach
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