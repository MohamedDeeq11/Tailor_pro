@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Profit</h5>
                        <a href="{{ url('/profits') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                    <form action="{{ route('profits.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-6">
                                            <div class="mb-9">
                                                <label class="form-label text-primary">Profit<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="profit_name" placeholder="Enter Profit" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput3" class="form-label text-primary">Total<span class="required">*</span></label>
                                                <input type="decimal" class="form-control" name="total" id="exampleFormControlInput3" placeholder="Enter Total">
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