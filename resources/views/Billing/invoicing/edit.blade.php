@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Invoicing</h5>
                        <a href="{{ url('/invoicings') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                    <form action="{{ route('invoicings.update', encrypt($invoicing->id)) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                        
                            
                                    <div class="row">
                               
                                  
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Company ID<span class="required">*</span></label>
                                                        <input type="number" class="form-control" name="company_id" value="{{ $invoicing->company_id }}"   placeholder="Enter Company ID">
                                                    
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">From<span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="From" value="{{ $invoicing->From }}" id="exampleFormControlInput1" placeholder="Enter From">
                                                    
                                                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date<span class="required">*</span></label>
                                                        <input type="date" class="form-control" name="Registered_date" value="{{ $invoicing->Registered_date }}" id="exampleFormControlInput1" placeholder="Enter Registered Date">
                                                    
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">To<span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="To" value="{{ $invoicing->To }}" id="exampleFormControlInput1" placeholder="Enter To">
                                                    
                                                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Product<span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="product" value="{{ $invoicing->product }}" id="exampleFormControlInput1" placeholder="Enter Product">
                                                    
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Price<span class="required">*</span></label>
                                                        <input type="number" class="form-control" name="price" value="{{ $invoicing->price }}" id="exampleFormControlInput1" placeholder="Enter Price">
                                                    
                                                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Payment Status<span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="PaymentStatus" value="{{ $invoicing->PaymentStatus }}"  id="exampleFormControlInput1" placeholder="Enter Payment Status">
                                                    
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label text-primary">Payment Method<span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="PaymentMethod" value="{{ $invoicing->PaymentMethod }}"   id="exampleFormControlInput1" placeholder="Enter Payment Method">
                                                    
                                                    </div>
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