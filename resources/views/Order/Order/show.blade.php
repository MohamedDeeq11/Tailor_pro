@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  Order </h5>
                        <a  href="{{ url('/order_details') }}" class="btn btn-primary" >
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
                        {{ $order_detail->company_id }}
                        </div>
                        <div class="mb-8">
                            <label for="exampleFormControlInput1" class="form-label text-primary">Branch ID</label>
                            {{ $order_detail->branch_id }}
                            </div>
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Client ID</label>
                                {{ $order_detail->client_id }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Date</label>
                                    {{ $order_detail->date }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Product ID</label>
                                        {{ $order_detail->product_id }}
                                        </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Price</label>
                                        {{ $order_detail->price }}
                                        </div>
                                        <div class="mb-8">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">Rodered Date</label>
                                            {{ $order_detail->Rodered_date }}
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