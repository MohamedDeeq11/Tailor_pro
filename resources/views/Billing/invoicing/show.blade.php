@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  invoicing</h5>
                        <a  href="{{ url('/invoicings') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                        {{ $invoicing->company_id }}
                        </div>
                     
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date</label>
                                {{ $invoicing->From }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Phone Number</label>
                                    {{ $invoicing->Registered_date }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">To</label>
                                        {{ $invoicing->To }}
                                        </div>
                                        <div class="mb-8">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Product</label>
                                            {{ $invoicing->product }}
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Price</label>
                                                {{ $invoicing->price }}
                                                </div>
                                                <div class="mb-8">
                                                    <label for="exampleFormControlInput1" class="form-label text-primary">Payment Status</label>
                                                    {{ $invoicing->PaymentStatus }}
                                                    </div>
                                                    <div class="mb-8">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Payment Method</label>
                                                        {{ $invoicing->PaymentMethod }}
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