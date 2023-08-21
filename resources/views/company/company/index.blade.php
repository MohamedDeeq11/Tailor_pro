@extends('layouts.admin')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
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
                    @elseif (Session::has('error'))
                    toastr.error('{{ Session::get('error') }}', 'Error!');
                @endif

            </script>
            <div class="col-lg-12">
                @foreach ($companys as $company)
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded">
                                <img src="/images/company.jpg" width="1050px" height="243px">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="/images/{{ $company->LogoPic }}" class="img-fluid rounded-circle" alt="">
                                {{-- <img src="images/profile/profile.png" class="img-fluid rounded-circle" alt=""> --}}
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                   
                                    <p>Company Name</p>
                                    <h4 class="text-muted mb-0">{{ $company->Name }}</h4>
                                </div>
                                <div class="profile-email px-2 pt-2">
                               
                                    <p>Email</p>
                                    <h4 class="text-muted mb-0">{{ $company->Email }}</h4>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                   
                                    <p>Registered Date</p>
                                    <h4 class="text-muted mb-0">{{ $company->Registered_date }}</h4>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                  
                                    <p>Address</p>
                                    <h4 class="text-muted mb-0">{{$company->address}}</h4>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <p>website</p>
                                    <h4 class="text-muted mb-0">{{$company->website}}</h4>
                                </div>
                            
                                <div class="dropdown ms-auto">
                                    <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"> <a href="{{ route('companys.edit',encrypt($company->id)) }}" >
                                            <i class="fa fa-pencil text-primary me-2"></i> Edit Company
                                        </a></li>
                                       
                                 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
  
    </div>
</div>
@endsection