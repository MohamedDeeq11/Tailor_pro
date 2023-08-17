@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12 " >
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Company</h5>
                        <a href="{{ url('/companys') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                    <form action="{{ route('companys.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                         
                                
                                    
                            <div class="row">
                                           <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Name"  placeholder="Enter Name">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Logo Picture<span class="required">*</span></label>
                                                <input type="file" class="form-control" name="LogoPic" placeholder="Enter Logo Pic">
                                            
                                            </div>
                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date <span class="required">*</span></label>
                                                <input type="date" class="form-control" name="Registered_date" id="exampleFormControlInput1" placeholder="Enter date">
                                            
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Email<span class="required">*</span></label>
                                                <input type="email" class="form-control" name="Email" id="exampleFormControlInput1" placeholder="Enter Email">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">website<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="website" id="exampleFormControlInput1" placeholder="Enter website">
                                            </div>
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Address<span class="required">*</span></label>
                                                <textarea name="address"  class="form-control" id="" cols="30" rows="2" placeholder="Enter Address"></textarea>
                                            
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