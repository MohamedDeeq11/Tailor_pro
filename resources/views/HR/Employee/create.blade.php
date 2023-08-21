@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Employee</h5>
                        <a href="{{ url('/employees') }}" class="btn btn-primary" >
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
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                           
                          
                                
                            <div class="row">
                                <div class="col-md-6 mb-3">                                                
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Company ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="company_id"  placeholder="Enter Company ID">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Branch ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="branch_id"  placeholder="Enter Branch ID">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter Name">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="phonenumber" id="exampleFormControlInput1" placeholder="Enter Phone Number">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Status<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Status" id="exampleFormControlInput1" placeholder="Enter Status">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Access To All Branchs<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="AccessToAllBranchs" id="exampleFormControlInput1" placeholder="Enter Access To All Branchs">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Address<span class="required">*</span></label>
                                                <textarea name="address"  class="form-control" id="" cols="30" rows="2" placeholder="Enter Address"></textarea>
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Position<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="position" id="exampleFormControlInput1" placeholder="Enter position">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="Registered_date" id="exampleFormControlInput1" placeholder="Enter Registered Date">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Refrence Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Refrence_Name" id="exampleFormControlInput1" placeholder="Enter Refrence Name">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Refrance Phone<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Refrance_phone" id="exampleFormControlInput1" placeholder="Enter Address">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Refrance Relation<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Refrance_relation" id="exampleFormControlInput1" placeholder="Enter Refrance Relation">
                                            
                                            </div>
                        </div>
                       
                        <div class="col-md-12 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Refrance Address<span class="required">*</span></label>
                                    
                                                <textarea name="Refrance_address"  class="form-control" id="" cols="30" rows="2" placeholder="Enter Refrance Address"></textarea>
                                            </div>
                                           
                                    
                          
                         
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection