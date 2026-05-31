@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Why choose us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'home/why-choose-us')}}">Why choose us</a></li>
                        <li class="breadcrumb-item active">Why choose us list</li>
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
                            <a href="{{url(sitePrefix().'home/why-choose-us/create')}}" class="btn btn-success pull-right">Add why choose us <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                        <div class="card-body">
                            <table class="dataTable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $slider->title !!}</td>
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                   data-extra_key="{{$slider->id}}" data-table="WhyChooseUs"
                                                   data-id="{{ $slider->id }}" class="common_sort_order" style="width:25%"
                                                   value="{{$slider->sort_order}}">
                                        </td>
                                        <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                                   title="WhyChooseUs" ref="{{ $slider->id }}"
                                                   @if($slider->status == "Active") checked="checked" @endif></td>
                                        <td>{{ date("d-M-Y", strtotime($slider->created_at)) }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(sitePrefix().'home/why-choose-us/edit/'.$slider->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Key Features"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Key Feature" data-url="home/why-choose-us/delete" data-id="{{$slider->id}}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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