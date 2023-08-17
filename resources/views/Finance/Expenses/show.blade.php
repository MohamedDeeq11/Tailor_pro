@extends('layouts.admin')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="overflow-y: scroll; height: 400px;">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Show   Expense</h5>
                        <a  href="{{ url('/expenses') }}" class="btn btn-primary" style="margin-right: 10px;">
                            <i class="fa fa-close"></i> 
                        </a>
                    </div>
              

    <div class="card-body">
  
        <div class="row"  style="font-size: 16px">
         
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <div class="col-xl-8 col-sm-6">
                        <div class="mb-8">
                        <label for="exampleFormControlInput1" class="form-label text-primary">Date</label>
                        {{ $expense->date }}
                        </div>
                        <div class="mb-8">
                        <label  class="form-label text-primary">Category</label>
                              {{ $expense->category }}
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label text-primary">Amount</label>
                    {{ $expense->amount }}
                        </div>
                    
                    </div>
             
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

                    
               

@endsection