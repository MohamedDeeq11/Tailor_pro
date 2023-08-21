@extends('layouts.admin')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-body " >
  
    <div class="container-fluid">
        <div class="row" >
            <!-- Column starts -->
            <div class="col-xl-12">
                <div class="card" id="bootstrap-table4">
                
        
                    <!-- /tab-content -->
                    
                    <div class="tab-content" id="myTabContent-3">
                        <h4 style="margin-top: 10px;margin-left:10px">Search Expense Report</h4>
                        <hr>
                        <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                            <div class="card-body p-0">
        
                                <form action="{{ route('expenses.store') }}" method="POST" >
                                    <div class="card-body">
                                        @csrf
                                       
                                        
                                               
                                        <div class="row">
                                            <div class="col-md-2 mb-3"> 
                                                <label for="exampleFormControlInput1" class="form-label text-primary" style="margin-left: 10px">ID</label>
                                                <input type="number" class="form-control" name="id" id="exampleFormControlInput1" placeholder="Enter ID">
                                            
                                            </div>
                                            <div class="col-md-2 mb-3"> 
                                                            <label for="exampleFormControlInput1" class="form-label text-primary">Date</label>
                                                            <input type="date" class="form-control" name="date" id="exampleFormControlInput1" placeholder="Enter Date">
                                                        
                                                        </div>
                                                        <div class="col-md-3 mb-3"> 
                                                            <label class="form-label text-primary">Category</label>
                                                            <input type="text" class="form-control" name="category" placeholder="Enter category" id="datepicker">
                                                        </div>
                                                        <div class="col-md-2 mb-3"> 
                                                            <label for="exampleFormControlInput3" class="form-label text-primary">Amount</label>
                                                            <input type="decimal" class="form-control" name="amount" id="exampleFormControlInput3" placeholder="Enter amount">
                                                        </div>
                                                        <div class="col-md-3 mb-3" style="margin-top: 25px"> 
                                                        <button type="submit" class="btn btn-primary">Search</button> 
                                                        <button type="submit" class="btn btn-warning" style="margin-left: 10px">Reset</button>
                                        </div>
                                        </div>
                                                  
                                         
                                       
                               
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
        
                    </div>
                    <!-- /tab-content -->
        
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card" id="bootstrap-table4">
                 
        
                    <!-- /tab-content -->
        
                    <div class="tab-content" id="myTabContent-3">
                        <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                            <div class="card-body p-0">   
                                <h4 style="margin-top: 10px;margin-left:10px">Expenses List</h4>
                                <hr>
                                <div class="table-responsive">
                                
                                    <script>
                                        // Set the toastr options globally
                                        toastr.options = {
                                            "timeOut": 4000,
                                            "progressBar" :true,
                                            "closeButton" :true,
        
                                        };
                                    
                                        // Check if 'success' message is present in the session and show toastr
                                        @if(Session::has('success'))
                                            toastr.success('{{ Session::get('success') }}', 'Success!');
                                        @endif
                                    </script>
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($expenses as $expense)
                                                <tr>
                                                    <th>{{ $expense->id }}</th>
                                                    <td>{{ $expense->date }}</td>
                                                    <td>{{ $expense->category }}</td>
                                                    <td>{{ $expense->amount }}</td>
                                                    {{-- <td>
                                                        <div class="d-flex">
                                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                                                <div class="d-flex">
                                                                    <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-warning shadow btn-xs sharp me-1">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
        
                                                                    @csrf
                                                                    @method('DELETE')
        
                                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
        
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        
                    </div>
                    <!-- /tab-content -->
        
                </div>
            </div>
        </div> 
    </div>

</div>


@endsection
