<style>
  
    .dlabnav-scroll {
        overflow-y: scroll;
        height: 500px;
        scrollbar-color: grey; 
    }

    .dlabnav-scroll::-webkit-scrollbar {
        width: 3px;
    }

    .dlabnav-scroll::-webkit-scrollbar-thumb {
        background-color: grey;
        border-radius: 10px;
    }

    .dlabnav-scroll::-moz-scrollbar {
        width: 8px;
    }

    .dlabnav-scroll::-moz-scrollbar-thumb {
        background-color: white;
        border-radius: 10px;
    }
</style>
<div class="dlabnav" style="background-color: #cf9f17">
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
              <img src="{{url('images/logo-w.png')}}" alt="" style="width:40px;heigh:40">
            <div class="brand-title">
                <img src="{{url('images/AL-06.png')}}" alt="" style="width:140px;heigh:30">
            </div> 
        </a>
        
    
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="22" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect y="11" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
                    <rect y="22" width="4" height="4" rx="2" fill="#2A353A"/>
                </svg>		
            </div>
        </div>
    </div>
    <div class="dlabnav-scroll"  id="scroll-area"> 	
        <ul class="metismenu" id="menu">
            <hr>
            <span class="nav-text" style="margin-left:40px;color:white"><strong>Basics</strong></span>
           <br>
           <li>
            <a class="has-arrow @if(Request::is('dashboard') || Request::is('private')) active @endif" href="javascript:void(0);">
                <i class="material-symbols-outlined">home</i>
                <span class="nav-text active">Dashboard</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('/private') }}">Private</a></li>
                <li><a href="{{ url('/dashboard') }}">Advanced</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow @if(Request::is('student') || Request::is('student-detail')) active @endif" href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text" style="margin-right: 1px"> My Account </span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{url('private_my_profile')}}">My Profile</a></li>
                <li><a href="{{url('private_security')}}">Security</a></li>
                <li><a href="{{url('private_payment_method')}}">Payment Method</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow @if(Request::is('companys') || Request::is('branchs') || Request::is('teacher-detail')) active @endif" href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">work</i>
                <span class="nav-text">Work</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('/companys') }}">Tasks</a></li>
          
            </ul>
        </li>
  
        </ul>
                
          
           
   
    </div>
</div>





    