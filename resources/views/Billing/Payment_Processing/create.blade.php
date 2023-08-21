@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Payment Processing</h5>
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
                    <form action="{{ route('payment_processings.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-6">
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">payment Method Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="payment_method_Name"  placeholder="Enter payment Method Name">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Number<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="Number" placeholder="Enter Number">
                                            
                                            </div>
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Payment Status<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="payment_status" id="exampleFormControlInput1" placeholder="Enter Payment Status">
                                            
                                            </div>
                                        </div>
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