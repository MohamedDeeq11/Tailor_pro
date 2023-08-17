@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  Employee</h5>
                        <a  href="{{ url('/employees') }}" class="btn btn-primary" style="margin-right: 10px;">
                            <i class="fa fa-close"></i> 
                        </a>
                    </div>
              

    <div class="card-body">
  
        <div class="row"  style="font-size: 16px">
         
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-xl-8 col-sm-6">
                        <div class="mb-8">
                        <label for="exampleFormControlInput1" class="form-label text-primary">Company ID</label>
                        {{ $employee->company_id }}
                        </div>
                        <div class="mb-8">
                            <label for="exampleFormControlInput1" class="form-label text-primary">Branch ID</label>
                            {{ $employee->branch_id }}
                            </div>
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Name</label>
                                {{ $employee->name }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number</label>
                                    {{ $employee->phonenumber }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Status</label>
                                        {{ $employee->Status }}
                                        </div>
                                        <div class="mb-8">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Access To All Branchs</label>
                                            {{ $employee->AccessToAllBranchs }}
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Address</label>
                                                {{ $employee->address }}
                                                </div>
                                                <div class="mb-8">
                                                    <label for="exampleFormControlInput1" class="form-label text-primary">position</label>
                                                    {{ $employee->position }}
                                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date</label>
                                        {{ $employee->Registered_date }}
                                        </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Refrence Name</label>
                                        {{ $employee->Refrence_Name }}
                                        </div>
                                        <div class="mb-8">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Refrance Phone</label>
                                            {{ $employee->Refrance_phone }}
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Refrance Relation</label>
                                                {{ $employee->Refrance_relation }}
                                                </div>
                                                <div class="mb-8">
                                                    <label for="exampleFormControlInput1" class="form-label text-primary">Refrance Address</label>
                                                    {{ $employee->Refrance_address }}
                                                    </div>
                                     
                    
                    </div>
             
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

                    
               

@endsection