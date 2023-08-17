@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  Company</h5>
                        <a  href="{{ url('/companys') }}" class="btn btn-primary" style="margin-right: 10px;">
                            <i class="fa fa-close"></i> 
                        </a>
                    </div>
              

    <div class="card-body">
  
        <div class="row"  style="font-size: 16px">
         
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-xl-8 col-sm-6">
                        <div class="mb-8">
                        <label for="exampleFormControlInput1" class="form-label text-primary">Name</label>
                        {{ $company->Name }}
                        </div>
                        <div class="mb-8">
                            <label for="exampleFormControlInput1" class="form-label text-primary">Logo Picture</label>
                            <img src="/images/{{ $company->LogoPic }}" width="50px">
                            </div>
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date</label>
                              {{ $company->Registered_date }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Email</label>
                                   {{ $company->Email }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">website</label>
                                       {{ $company->website }}
                                        </div>
                                        <div class="mb-8">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Address</label>
                                            {{ $company->address }}
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