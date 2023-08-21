@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Order </h5>
                        <a href="{{ url('/order_details') }}" class="btn btn-primary" >
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
                    <form action="{{ route('order_details.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Client ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="client_id" id="exampleFormControlInput1" placeholder="Enter Client ID">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="date" id="exampleFormControlInput1" placeholder="Enter Date">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Product ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="product_id" id="exampleFormControlInput1" placeholder="Enter Product ID">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Price<span class="required">*</span></label>
                                                <input type="decimal" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Enter Price">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Rodered Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="Rodered_date" id="exampleFormControlInput1" placeholder="Enter Rodered Date">
                                            
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