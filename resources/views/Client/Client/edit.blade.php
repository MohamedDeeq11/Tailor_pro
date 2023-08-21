@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row"style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Client</h5>
                        <a href="{{ url('/clients') }}" class="btn btn-primary" >
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('clients.update', encrypt($client->id)) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                             
                                <div class="row">
                                    <div class="col-md-6 mb-3">
      
                                    <label for="exampleFormControlInput1" class="form-label text-primary" style="color: black">Company ID<span class="required">*</span></label>
                                    <input type="number" class="form-control" name="company_id" value="{{ $client->company_id }}"  placeholder="Enter Company ID">
                                </div>
                          <br>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Branch ID<span class="required">*</span></label>
                                    <input type="number" class="form-control" name="branch_id"  value="{{ $client->branch_id }}" placeholder="Enter Branch ID">
                                </div>
                                    </div>
                                    <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Full Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="Fullname" value="{{ $client->Fullname }}" id="exampleFormControlInput1" placeholder="Enter Full Name">
                                </div>
                               
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number<span class="required">*</span></label>
                                    <input type="number" class="form-control" name="phonenumber" value="{{ $client->phonenumber }}" id="exampleFormControlInput1" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date<span class="required">*</span></label>
                                    <input type="date" class="form-control" name="Registered_date" value="{{ $client->Registered_date }}" id="exampleFormControlInput1" placeholder="Enter Registered Date">
                                </div>
                             
                                <div class="col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Address<span class="required">*</span></label>
                                   
                                    <textarea name="address"  class="form-control" id="" cols="30" rows="2" placeholder="Enter Address">{{ $client->address }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div >
                            <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection