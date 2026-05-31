@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Quote</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Quote List</li>
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
                        <div class="box-header" style="height:50px;">
                            <div class="box-tools" style="margin-top: 8px;">
                                <div class="col-sm-12">
                                    <div class="actions delete_btn" style="display: none;">
                                        <input type="hidden" name="ids" id="ids">
                                        <a href="javascript:void(0);" id="delete_quote_btn" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="recordsListView" class="table table-bordered table-hover dataTable">
                            <thead>
                                    <tr>
                                        <th>ID  <input type="checkbox" class="mt-2 ml-3" name="check_all" id="check_all"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Product</th>
                                        <th>Comments</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php $i=1 @endphp @foreach($contactList as $contact)
                                        <tr>
                                            <td>{{ $i }} <input type="checkbox" class="single_box mt-2 ml-3" name="single_box" id="{{ $contact->id }}" value="{{ $contact->id }}"></td>
                                            <td>{{ $contact->first_name.' '.$contact->last_name}}</td>
                                            <td>{{ $contact->email}}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td><a href="{{asset($contact->product_image)}}" class="fancy"><img src="{{asset($contact->product_image)}}"  style="width:50%;"></a></td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ date("d-M-Y", strtotime($contact->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Quote" data-url="contact/delete_quote" data-id="{{$contact->id}}"><i class="fas fa-trash"></i></a>
                                                    <a class="btn btn-success mr-2 replay_modal" href="javascript:void(0)"  data-url="contact/replay_to_quote" data-toggle="modal" data-replay="{!! $contact->reply !!}" data-id="{{ $contact->id }}" data-request="{!! $contact->message !!}"><i class="fa fa-reply fa-lg" style="color:{{ ($contact->reply==NULL)?'red':'green' }}"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @php $i++;@endphp@endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="replay-modal">
      <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" id="formWizard" class="quote_replay_form">
                <div class="modal-header">
                    <h4 class="modal-title">Quote Request Replay</h4>
                </div>
                <div class="modal-body">   
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label> Request*</label>
                                <textarea disabled id="request_details" class="form-control">
                                    
                                </textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label> Replay*</label>
                                <textarea class="form-control" required id="replay" name="replay" placeholder="Replay to request"></textarea>
                              </div>
                            </div>  
                        </div>                 
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="replay_to_contact" value="Update Replay">
                        <input type="hidden" id="url" name="url" value="replay_to_quote">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
</div>    
@endsection
