@extends('layouts.admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="clearfix">
                    <div class="card card-bx profile-card author-profile m-b30">
                        <div class="card-body">
                            <div class="p-5">
                                <div class="author-profile">
                                    <div class="author-media">
                                        <div class="user-media">
                                            @if ($company->LogoPic)
                                                <!-- Display uploaded image if available -->
                                                <img src="/images/{{ $company->LogoPic }}" class="avatar avatar-xxl" alt="">
                                            @else
                                                <!-- Display default image if no uploaded image -->
                                                <img src="/images/no-img-avatar.png" class="avatar avatar-xxl" alt="Default Image">
                                            @endif
                                        </div>
                                        <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                            <input  class="update-flie">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="author-info">
                                        <h6 class="title">{{$company->Name}} </h6>
                                        <span>{{$company->Email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li><span>{{$company->address}}</span></li>
                                    <li><span>{{$company->Registered_date}}</span></li>
                               
                                </ul>
                            </div>
                        </div>
                        <div class="input-group">
                            <a  class="form-control text-primary rounded text-center bg-white">{{$company->website}}</a>
                        </div>
                        <div class="card-footer">
                            <div class="input-group mb-3">
                                <div class="form-control rounded text-center bg-white"><a class="dropdown-item" href="{{url('companys')}}">Back</a></div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card profile-card card-bx">
            
                    <form action="{{ route('companys.update',encrypt($company->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label"> Name</label>
                                    <input type="text" class="form-control" name="Name" value=" {{ $company->Name }}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="Email" value="{{ $company->Email }}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $company->address }}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" name="website" id="exampleFormControlInput1" value="{{ $company->website }}">
                                </div>	
                                {{-- <div class="col-sm-6 m-b30">
                                    <label class="form-label d-block">Gender</label>
                                    <select class="selectpicke w-100">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div> --}}
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Registered Date</label>
                                    <input type="date" class="form-control" name="Registered_date" id="exampleFormControlInput1" value="{{ $company->Registered_date }}">
                                                
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">Logo Picture</label>
                                    <input type="file" class="form-control" name="LogoPic" id="LogoPic">
                                    <div class="user-media">
                                        @if ($company->LogoPic)
                                            <!-- Display uploaded image if available -->
                                            <img src="/images/{{ $company->LogoPic }}" class="avatar avatar-xxl" alt="">
                                        @else
                                           
                                            <img src="/images/no-img-avatar.png" class="avatar avatar-xxl" alt="Default Image">
                                        @endif
                                    </div>
                                </div>
         
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>	
      
    </div>
</div>
@endsection