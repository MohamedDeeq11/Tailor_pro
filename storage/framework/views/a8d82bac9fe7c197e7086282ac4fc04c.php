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
	<title>Check out</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" >
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center  d-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-lg-4 mb-2 pt-5 logo">
					<img src="<?php echo e(url('images/logo/AL-04.png')); ?>" alt="" style="width:300px;heigh:200px">
				</div>
				<h3 class="mb-2 text-white">CheckOut!</h3>

			</div>
			<div class="aside-image position-relative" style="background-image:url(images/background/pic-2.png);">
				<img class="img1 move-1" src="<?php echo e(url('images/background/pic3.png')); ?>" alt="">
				<img class="img2 move-2" src="<?php echo e(url('images/background/pic4.png')); ?>" alt="">
				<img class="img3 move-3" src="<?php echo e(url('images/background/pic5.png')); ?>" alt="">
				
			</div>
		</div>
<div class="content-body" >
    <div class="container-fluid mh-auto">
        <div class="row"  style="margin-right: 30%" >
            <form action="<?php echo e(url('place-order')); ?>" method="POST">
                <?php echo csrf_field(); ?>
            <div class="col-xl-12" >
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 order-lg-4 mb-3">
                                <h4 >
                                    <span class="text-black" >Your cart</span>
                                  
                                </h4>
                                

                                <table id="cart" class="table table-hover table-condensed" style="margin-right: 20px;width:10%">
                                    <thead>
                                        <tr>
                                            <th >Product</th>
                                            <th >Description</th>
                                            <th >Price</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0 ?>
                                        <?php if(session('cart')): ?>
                                        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                        <tr data-id="<?php echo e($id); ?>">
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <h5 class="nomargin"><?php echo e($details['name']); ?></h5>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price"><h5 class="nomargin"><?php echo e($details['description']); ?></h5></td>
                                            <td data-th="Price">$<?php echo e($details['price']); ?></td>
                                            
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot >
                                        <tr >
                                            <td colspan="5" style="text-align:right;">
                                                <h3><strong>Total $<?php echo e($total); ?></strong></h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align:right;">
                                                <button class="btn btn-primary btn-block" type="submit">Place Order</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                              
                            </div>
                            <div class="col-lg-8 order-lg-1">
                                <h4 class="mb-3">Basic Details</h4>
                              
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName" class="form-label">First name</label>
                                            <input type="text" class="form-control" id="firstName" name="fname" placeholder="Enter FirstName" value="" required="">
                                         
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName"  class="form-label">Last name</label>
                                            <input type="text" class="form-control" id="lastName" name="lname"  placeholder="Enter LastName" value="" required="">
                                           
                                       
                                    </div>

                                    <div class="mb-3">
                                        <label for="email"  class="form-label">Email </label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email">
                                       
                                    </div>
                                    <div class="mb-3">
                                        <label for="email"  class="form-label">Phone number </label>
                                        <input type="number" class="form-control" id="phone" name="mobile"  placeholder="Enter Phone number">
                                    
                                    </div>

                                    <div class="mb-3">
                                        <label for="address"  class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address1" placeholder="Enter Address1" required="">
                                       
                                    </div>

                                    <div class="mb-3">
                                        <label for="address2"  class="form-label">Address 2 <span
                                                class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address2">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" id="Country" name="country" placeholder="Enter Country" required="">
                                         
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" id="city" name="city"  placeholder="Enter City" required="">
                                          
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label  class="form-label">State</label>
                                            <input type="text" class="form-control" id="State" name="state"  placeholder="Enter State" required="">
                                           
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="zip"  class="form-label">Pin Code</label>
                                            <input type="text" class="form-control" id="pincode" name="pincode"  placeholder="Enter Pincode" required="">
                                         
                                        </div>
                                    </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
         <!--**********************************
            Footer start
        ***********************************-->
        
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
</div>
    </div>
<script src="<?php echo e(url('vendor/global/global.min.')); ?>"></script>
<script src="<?php echo e(url('js/custom.min.js')); ?>"></script>
<script src="<?php echo e(url('js/dlabnav-init.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/auth/Checkout.blade.php ENDPATH**/ ?>