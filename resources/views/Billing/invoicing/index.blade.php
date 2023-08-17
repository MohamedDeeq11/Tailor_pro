@extends('layouts.admin')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row" style="width: 90%; margin-left: 18%; margin-top: 5%;">
    <!-- Column starts -->
    <div class="col-xl-11">
        <div class="card" id="bootstrap-table4">
            <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                <div style="background-color: ">
                    <br>
                    <a href="{{ route('invoicings.create') }}" class="btn btn-primary" style="margin-right: 10px;">
                        <i class="fa fa-plus"></i> Add New Invoicing
                    </a>
                </div>
            </div>
            <div class="tab-content" id="myTabContent-3">
                <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                    <div class="card-body p-0">
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
                            <table table  id="example" class="display table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        {{-- <th >Company ID</th> --}}
                                        <th>From</th>
                                        <th>Registered Date</th>
                                        <th>To</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoicings as $invoicing)
                                    <tr>
                                        <td >{{ $invoicing->id }}</td>
                                        {{-- <td >{{ $invoicing->company_id }}</td> --}}
                                        <td >{{ $invoicing->From }}</td>
                                        <td >{{ $invoicing->Registered_date }}</td>
                                        <td >{{ $invoicing->To }}</td>
                                        <td >{{ $invoicing->product }}</td>
                                        <td >{{ $invoicing->price }}</td>
                                        <td >{{ $invoicing->PaymentStatus }}</td>
                                        <td >{{ $invoicing->PaymentMethod }}</td>
                                        <td >
                                            <div class="d-flex">
                                                <form action="{{ route('invoicings.destroy', $invoicing->id) }}" method="POST">
                                                    <div class="d-flex">
                                                        <a href="{{ route('invoicings.show', encrypt($invoicing->id)) }}" class="btn btn-warning shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('invoicings.edit',encrypt($invoicing->id)) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
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
@endsection