@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Product Category</h5>
                        <a href="{{ url('/payment_processings') }}" class="btn btn-primary" >
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
                    <form action="{{ route('payment_processings.update', encrypt($payment_processing->id)) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-6">
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">payment Method Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="payment_method_Name" value="{{ $payment_processing->payment_method_Name }}"  placeholder="Enter payment Method Name">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Number<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="Number" value="{{ $payment_processing->Number }}" placeholder="Enter Number">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Payment Status<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="payment_status" value="{{ $payment_processing->payment_status }}" placeholder="Enter Payment Status">
                                            
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <br>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection