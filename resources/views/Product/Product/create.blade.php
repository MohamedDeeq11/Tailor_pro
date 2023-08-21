@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Product</h5>
                        <a href="{{ url('/products') }}" class="btn btn-primary" >
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
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                         
                               
                                    
                            <div class="row">     
                                <div class="col-md-6 mb-3">

                                                <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="Registered_date"  placeholder="Enter Registered Date">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Description<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Enter Description">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Price<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Enter Price">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Unity<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="Unity" id="exampleFormControlInput1" placeholder="Enter Unity">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Product Category ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="product_category_id" id="exampleFormControlInput1" placeholder="Enter Product Category ID">
                                            
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