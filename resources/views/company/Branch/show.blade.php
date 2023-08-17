@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  Branch</h5>
                        <a  href="{{ url('/branchs') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                        {{ $branch->company_id }}
                        </div>
                     
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Branch Name</label>
                                {{ $branch->branch_name }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number</label>
                                    {{ $branch->phone_number }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Address</label>
                                        {{ $branch->address }}
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