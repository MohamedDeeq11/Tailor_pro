<!DOCTYPE html>
<html lang="en">
<head>
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
	<title>Akademi : School and Education Management Admin Dashboard Template</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" >
	<link href="<?php echo e(url('vendor/wow-master/css/libs/animate.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')); ?>" rel="stylesheet">
	<link rel="<?php echo e(url('stylesheet" href="vendor/bootstrap-select-country/css/bootstrap-select-country.min.css')); ?>">
	<link rel="<?php echo e(url('stylesheet" href="vendor/jquery-nice-select/css/nice-select.css')); ?>">
	<link href="<?php echo e(url('vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet')); ?>">
	
	 <link href="<?php echo e(url('vendor/datatables/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
	<!--swiper-slider-->
	<link rel="stylesheet" href="<?php echo e(url('vendor/swiper/css/swiper-bundle.min.css')); ?>">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
	  <div class="loader">
		<div class="dots">
			  <div class="dot mainDot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
		</div>
			
		</div>
	</div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="wallet-open active">
	

        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        <!--**********************************
            Nav header start
       
			*********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
        
        ***********************************-->
		<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
		<!--****
		Wallet Sidebar
		****-->
		
	
		<!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
		<?php echo $__env->yieldContent('content'); ?>;
	
		
        <!--**********************************
            Content body end
        ***********************************-->
		<!--**********************************
			Footer start
		***********************************-->
		<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

	</div>

	
    <!--**********************************
        Main wrapper end
    ***********************************-->

<!--***********************************-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		
	<!--**********************************
		Modal
	***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo e(url('vendor/global/global.min.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/chart.js/Chart.bundle.min.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')); ?>"></script>
	<!-- Apex Chart -->
	<script src="<?php echo e(url('vendor/apexchart/apexchart.js')); ?>"></script>
	<!-- Chart piety plugin files -->
    <script src="<?php echo e(url('vendor/peity/jquery.peity.min.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/jquery-nice-select/js/jquery.nice-select.min.js')); ?>"></script>
	<!--swiper-slider-->
	<script src="<?php echo e(url('vendor/swiper/js/swiper-bundle.min.js')); ?>"></script>
	
	
    <!-- Datatable -->
    <script src="<?php echo e(url('vendor/datatables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/plugins-init/datatables.init.js')); ?>"></script>

	<!-- Dashboard 1 -->
	<script src="<?php echo e(url('js/dashboard/dashboard-1.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/wow-master/dist/wow.min.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/bootstrap-datetimepicker/js/moment.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
	<script src="<?php echo e(url('vendor/bootstrap-select-country/js/bootstrap-select-country.min.js')); ?>"></script>
	
	<script src="<?php echo e(url('js/dlabnav-init.js')); ?>"></script>
    <script src="<?php echo e(url('js/custom.min.js')); ?>"></script>
	
   
	
	
</body>
</html><?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/layouts/admin.blade.php ENDPATH**/ ?>