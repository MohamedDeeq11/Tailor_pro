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
            <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                <div style="background-color: ">
                    <br>
             
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
                        
                            <h2 style="text-align: center">If you want To back up Your Database Click The Button</h2 >
                            <br>
                          
                        </div>
                        <br>
                        <form id="backupForm" method="post" action="{{ route('backup.create') }}">
                            @csrf
                        <button type="submit" class="btn btn-primary"  style="margin-left: 45%;margin-bottom: 10% "><i class="fa fa-database"></i>  BackUp</button>
                        </form>
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