
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
    <div class="container-fluid" style="margin-top: 40px">
      <div class="container p-5">
        <div class="row">
          <div class="dropdown" style="margin-left: 88%" >
            <a class="btn btn-outline-dark" href="<?php echo e(route('plans.cart')); ?>" >
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
              <span class="badge text-bg-danger"><?php echo e(count((array) session('cart'))); ?></span>
             </a>
        </div>
        <div class="container mt-4">
          <?php if(session('success')): ?>
              <div class="alert alert-success">
                <?php echo e(session('success')); ?>

              </div> 
          <?php endif; ?>
        </div>
        <br><br>
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <div class="col-lg-4 col-md-12 mb-4">
    <div class="card h-100 shadow-lg">
      <div class="card-body">
        <div class="text-center p-4">
          <h5 class="card-title"><?php echo e($plan->name); ?></h5>
          
          <br><br>
          <span class="h1" style="margin-left: 20px"><?php echo e($plan->price); ?></span>/month
          <br><br>
        </div>
        <p class="text-center p-3">
          <?php echo e($plan->description); ?>

        </p>
      </div>
      
      <div class="card-body text-center">
        <p class="btn-holder"><a href="<?php echo e(route('addplan.to.cart', $plan->id)); ?>" class="btn btn-outline-danger">Buy</a> </p>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-3ou4y6o8rBzTQgQC4M3g9v4f6e3/qhM6lbA0O56GGnBbllScU+Sp/H70YL5By/1Q" crossorigin="anonymous"></script>
  <?php echo $__env->yieldContent('scripts'); ?>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    
</body>
</html><?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/auth/plans.blade.php ENDPATH**/ ?>