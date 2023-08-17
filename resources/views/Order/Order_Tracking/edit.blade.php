@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit  Order Tracking</h5>
                        <a  href="{{ url('/order_trackings') }}" class="btn btn-primary" style="margin-right: 10px;">
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
<form action="{{ route('order_trackings.update',encrypt($order_tracking->id)) }}" method="POST">
    <div class="card-body">
        @csrf
        @method('PUT')
        <div class="row">
         
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-xl-8 col-sm-6">
                        <div class="mb-9">
                            <label class="form-label text-primary">Status<span class="required">*</span></label>
                            <input type="text" class="form-control" value="{{ $order_tracking->status }}" name="status" placeholder="Enter Status" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label text-primary">Date Line<span class="required">*</span></label>
                            <input type="date" class="form-control" name="expected_date_completion" value="{{ $order_tracking->expected_date_completion }}" id="exampleFormControlInput3" placeholder="Enter Expected Date Of Completion">
                        </div>
                    </div>
                 
                </div>
                <br>
                <div >
                    <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>
                    
               

@endsection