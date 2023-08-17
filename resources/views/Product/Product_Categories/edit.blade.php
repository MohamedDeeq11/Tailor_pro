@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 500px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Product Category</h5>
                        <a href="{{ url('/product_categories') }}" class="btn btn-primary" style="margin-right: 10px;">
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
                    <form action="{{ route('product_categories.update',  encrypt($product_category->id)) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-8 col-sm-6">
                                            <div class="mb-8">
                                                <label for="exampleFormControlInput1" class="form-label text-primary">Categorie Name<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="CategorieName" value="{{ $product_category->CategorieName }}" placeholder="Enter Categorie Name">
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