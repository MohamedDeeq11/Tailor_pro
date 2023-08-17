<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
   <!-- All Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab" >
	<meta name="robots" content="" >
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management" >
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard" >
	<meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template" >
	<meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png" >
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>Login</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" >
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="body  h-100">
	<div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center  d-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-lg-4 mb-2 pt-5 logo">
					<img src="{{url('images/logo/AL-02.png')}}" alt="" style="width:300px;heigh:200px">
				</div>
				<h3 class="mb-2 text-white">Add To your Cart!</h3>

			</div>
			<div class="aside-image position-relative" style="background-image:url(images/background/pic-2.png);">
				<img class="img1 move-1" src="{{url('images/background/pic3.png')}}" alt="">
				<img class="img2 move-2" src="{{url('images/background/pic4.png')}}" alt="">
				<img class="img3 move-3" src="{{url('images/background/pic5.png')}}" alt="">
				
			</div>
		</div>
		<div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12"  style="margin-left: 50%;margin-top:10px" >
			<div class="card">
				<div class="card-body text-center ai-icon  text-primary">
					
					
					<form action="{{url('cart')}}" method="post">
						<div  >
						
                     
                                    
                            <a href="javascript:void(0);;;"       class="btn my-2 btn-primary btn-lg px-4"><i class="fa-solid fa-cart-shopping"></i>  Add To Chart</a>
                    
            </div>
						
					</form>
					
				
					{{-- <a href="javascript:void(0);;;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Earn Budges</a> --}}
				</div>
			</div>
		</div>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{url('vendor/global/global.min.')}}"></script>
    <script src="{{url('js/custom.min.js')}}"></script>
    <script src="{{url('js/dlabnav-init.js')}}"></script>
	
</body>
</html>