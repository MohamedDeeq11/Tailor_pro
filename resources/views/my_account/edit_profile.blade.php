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
                                            @if ($profile->userpic)
                                                <!-- Display uploaded image if available -->
                                                <img src="/images/{{ $profile->userpic }}" class="avatar avatar-xxl" alt="">
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
                                        <h6 class="title">{{$profile->fname}} {{$profile->lname}}</h6>
                                        <span>{{$profile->mobile}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li><span>{{$profile->address}}</span></li>
                                    <li><span>{{$profile->email}}</span></li>
                               
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group mb-3">
                                <div class="form-control rounded text-center bg-white"><a class="dropdown-item" href="{{url('my_profile')}}">Back To Profile</a></div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card profile-card card-bx">
            
                    <form action="{{route('profile.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="fname" value="{{$profile->fname}}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lname" value="{{$profile->lname}}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$profile->address}}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{$profile->email}}">
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
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" id="exampleFormControlInput1" value="{{$profile->mobile}}">
                                                
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label for="exampleFormControlInput1" class="form-label text-primary">IMage</label>
                                    <input type="file" class="form-control" name="userpic" id="userpic">
                                    <div class="user-media">
                                        @if ($profile->userpic)
                                            <!-- Display uploaded image if available -->
                                            <img src="/images/{{ $profile->userpic }}" class="avatar avatar-xxl" alt="">
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