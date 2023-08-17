@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Invoicing</h5>
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
                    <form action="{{ route('invoicings.store',$company->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                               
                                  
                                        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        @foreach ($companys as $company)
                                                {{-- <label for="exampleFormControlInput1" class="form-label text-primary">Company ID<span class="required">*</span></label> --}}
                                                <input type="hidden" class="form-control" name="company_id" value="{{ $company->id }}"   >
                                           @endforeach
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">From<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="From" id="exampleFormControlInput1" placeholder="Enter From">
                                            
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Registered Date<span class="required">*</span></label>
                                                <input type="date" class="form-control" name="Registered_date" id="exampleFormControlInput1" placeholder="Enter Registered Date">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">To<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="To" id="exampleFormControlInput1" placeholder="Enter To">
                                            
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Product<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="product" id="exampleFormControlInput1" placeholder="Enter Product">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Price<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Enter Price">
                                            
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Payment Status<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="PaymentStatus" id="exampleFormControlInput1" placeholder="Enter Payment Status">
                                            
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Payment Method<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="PaymentMethod" id="exampleFormControlInput1" placeholder="Enter Payment Method">
                                            
                                            </div>
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