@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row"style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  Client</h5>
                        <a  href="{{ url('/clients') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                        {{ $client->company_id }}
                        </div>
                        <div class="mb-8">
                            <label for="exampleFormControlInput1" class="form-label text-primary">Branch ID</label>
                            {{ $client->branch_id }}
                            </div>
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Full Name</label>
                                {{ $client->Fullname }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number</label>
                                    {{ $client->phonenumber }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date</label>
                                        {{ $client->Registered_date }}
                                        </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Address</label>
                                        {{ $client->address }}
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