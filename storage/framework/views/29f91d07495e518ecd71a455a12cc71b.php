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
	<title>Akademi : School and Education Management Admin Dashboard Template</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" >
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="body  h-100">
	<div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center  d-flex flex-column flex-row-auto"  >
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15" >
				<div class="text-center mb-lg-4 mb-2 pt-5 logo">
                    <img src="<?php echo e(url('images/logo/AL-04.png')); ?>" alt="" style="width:300px;heigh:200px">
				</div>
				<h3 class="mb-2 text-white">Register Here!</h3>
				
			</div>
			<div class="aside-image position-relative" style="background-image:url(images/background/pic-2.png);">
				<img class="img1 move-1" src="<?php echo e(url('images/background/pic3.png')); ?>" alt="">
				<img class="img2 move-2" src="<?php echo e(url('images/background/pic4.png')); ?>" alt="">
				<img class="img3 move-3" src="<?php echo e(url('images/background/pic5.png')); ?>" alt="">
				
			</div>
		</div>
		<div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			<div class="d-flex justify-content-center h-100 align-items-center">
				<div class="authincation-content style-2">
					<div class="row no-gutters">
						<div class="col-xl-12 tab-content">
							<div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
								<?php if(session('success')): ?>
								<div class="alert alert-success " role="alert"> 
									<?php echo e(session('success')); ?> 
								</div> 
								<?php elseif(!empty(session('error'))): ?> 
						<div class="alert alert-danger " role="alert"> 
							<?php echo e(session('error')); ?> 
						</div> 
						<?php endif; ?>	
								<form action="<?php echo e(url('/register')); ?>" method="post">
								<?php echo csrf_field(); ?>
									<div >
										<label for="fname" ><?php echo e(__('First Name')); ?></label>
							
										<div >
											<input id="fname" type="text" class="form-control" name="fname" value="<?php echo e(old('fname')); ?>" required autocomplete="fname" placeholder="First Name" autofocus>
							
											<?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span  role="alert-danger">
													<strong style="color: red"><?php echo e($message); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
									<div >
										<label for="lname" ><?php echo e(__('Last Name')); ?></label>
							
										<div >
											<input id="lname" type="text" class="form-control" name="lname" value="<?php echo e(old('lname')); ?>" required autocomplete="lname" placeholder="Last Name" autofocus required>
							
											<?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span  role="alert-danger">
													<strong style="color: red"><?php echo e($message); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
									<div >
										<label for="mobile" ><?php echo e(__('Mobile Number')); ?></label>
							
										<div >
											<input id="mobile" type="tel" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>" required autocomplete="mobile" placeholder="Mobile Number" autofocus required>
							
											<?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span  role="alert-danger">
													<strong style="color: red"><?php echo e($message); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
					
									<div >
										<label for="email" ><?php echo e(__('Email Address')); ?></label>
							
										<div >
											<input id="email" type="email" class="form-control"  name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email" required>
							
											<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span  role="alert-danger">
													<strong style="color: red"><?php echo e($message); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
							
									<div >
										<label for="password" ><?php echo e(__('Password')); ?></label>
							
										<div >
											<input id="password" type="password" class="form-control" name="password" required autocomplete="new-password"  placeholder="Password" required>
							
											<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span  role="alert-danger">
													<strong style="color: red"><?php echo e($message); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
							
									<div >
										<label for="password-confirm" ><?php echo e(__('Confirm Password')); ?></label>
							
										<div >
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password" required>
										</div>


									</div>
									<br>
									<div class="form-check custom-checkbox mb-3">
										<input type="checkbox" class="form-check-input" id="customCheckBox1" required="">
										<p class="form-check-label" for="customCheckBox1" style="font-size: 12px">you have agree the <a href="#" target="_blank" style="color: #cf9f17">terms & conditions</a> of TailorPro</p>
									</div>
								
									<button type="submit" class="btn btn-block btn-primary" style="margin-top: 20px">Sign me up</button>
									
								</form>
								<div class="new-account mt-3 text-center">
									<p class="font-w500" >Already have an account? <a class="text-primary" href="<?php echo e(url('/login')); ?>">Sign in</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo e(url('vendor/global/global.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/dlabnav-init.js')); ?>"></script>
	
</body>
</html><?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/auth/registration.blade.php ENDPATH**/ ?>