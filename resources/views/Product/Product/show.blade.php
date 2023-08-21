@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 400px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show  Product</h5>
                        <a  href="{{ url('/products') }}" class="btn btn-primary">
                            <i class="fa fa-close"></i> 
                        </a>
                    </div>
              

    <div class="card-body">
  
        <div class="row"  style="font-size: 16px">
         
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-xl-8 col-sm-6">
                        <div class="mb-8">
                        <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date</label>
                        {{ $product->Registered_date }}
                        </div>
                        <div class="mb-8">
                            <label for="exampleFormControlInput1" class="form-label text-primary">Name</label>
                            {{ $product->name }}
                            </div>
                            <div class="mb-8">
                                <label for="exampleFormControlInput1" class="form-label text-primary">Description</label>
                                {{ $product->description }}
                                </div>
                                <div class="mb-8">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Price</label>
                                    {{ $product->price }}
                                    </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Unity</label>
                                        {{ $product->Unity }}
                                        </div>
                                    <div class="mb-8">
                                        <label for="exampleFormControlInput1" class="form-label text-primary">Product Category ID</label>
                                        {{ $product->product_category_id }}
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