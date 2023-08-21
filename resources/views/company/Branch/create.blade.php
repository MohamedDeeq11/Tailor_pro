@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Branch</h5>
                        <a href="{{ url('/branchs') }}" class="btn btn-primary" >
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
                    <form action="{{ route('branchs.store', $company->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-6">
                                            <div class="mb-8">
                                            
                                                <input type="hidden" name="company_id" value="{{ $company->id }}">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Branch Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="branch_name" id="exampleFormControlInput1" placeholder="Enter Branch Name">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="phone_number" id="exampleFormControlInput1" placeholder="Enter Phone Number">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Address<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="Enter Address">
                                            
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection