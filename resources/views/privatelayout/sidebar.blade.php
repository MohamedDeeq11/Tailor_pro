Sidebar start
***********************************-->
{{-- <style>


    #scroll-area::-webkit-scrollbar-thumb {
        background-color: grey; /* Set the background color of the scrollbar thumb */
        border-radius: 100px; /* Adjust the border-radius for a rounded appearance */
    }
</style> --}}
<style>
    /* Target the scrollbar of the dlabnav-scroll div */
    .dlabnav-scroll {
        overflow-y: scroll;
        height: 500px;
        scrollbar-color: grey; /* Set the color of the scrollbar (only works in Firefox) */
    }

    /* Target the scrollbar thumb and track for WebKit browsers (Chrome, Safari, etc.) */
    .dlabnav-scroll::-webkit-scrollbar {
        width: 3px;
    }

    .dlabnav-scroll::-webkit-scrollbar-thumb {
        background-color: grey;
        border-radius: 10px;
    }

    /* Target the scrollbar thumb and track for Firefox browsers */
    .dlabnav-scroll::-moz-scrollbar {
        width: 8px;
    }

    .dlabnav-scroll::-moz-scrollbar-thumb {
        background-color: white;
        border-radius: 10px;
    }
</style>
<div class="dlabnav" style="background-color: #cf9f17">
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
                <li><a href="student.html">My Profile</a></li>
                <li><a href="student-detail.html">Security</a></li>
                <li><a href="student-detail.html">Payment Method</a></li>
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





    