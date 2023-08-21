@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Order </h5>
                        <a href="{{ url('/order_details') }}" class="btn btn-primary">
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
                    <form action="{{ route('order_details.update', encrypt($order_detail->id)) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Company ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="company_id" value="{{ $order_detail->company_id }}"   placeholder="Enter Company ID">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Branch ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="branch_id" value="{{ $order_detail->branch_id }}"   placeholder="Enter Branch ID">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Client ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="client_id" value="{{ $order_detail->client_id }}" id="exampleFormControlInput1" placeholder="Enter Client ID">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="date" value="{{ $order_detail->date }}" id="exampleFormControlInput1" placeholder="Enter Date">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Product ID<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="product_id" value="{{ $order_detail->product_id }}" id="exampleFormControlInput1" placeholder="Enter Product ID">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Price<span class="required">*</span></label>
                                                <input type="decimal" class="form-control" name="price" value="{{ $order_detail->price }}"  id="exampleFormControlInput1" placeholder="Enter Price">
                                            
                                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Rodered Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="Rodered_date" value="{{ $order_detail->Rodered_date }}" id="exampleFormControlInput1" placeholder="Enter Rodered Date">
                                            
                                            </div>
                            </div>
                            <br>
                                    <div class="col-sm-6">
                                        <button type="Update" class="btn btn-primary">Update</button>
                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection