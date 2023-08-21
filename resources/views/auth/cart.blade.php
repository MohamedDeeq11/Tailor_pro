<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
   <!-- All Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="">
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management">
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:title" content="Akademi: School and Education Management Admin Dashboard Template">
	<meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>Login</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link href="css/style.css" rel="stylesheet">
</head>

<body >
	<div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="login-aside text-center d-flex flex-column flex-row-auto">
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<div class="text-center mb-lg-4 mb-2 pt-5 logo">
					<img src="{{ url('images/logo/AL-04.png') }}" alt="" style="width: 300px; height: 200px">
				</div>
			
			</div>
			<div class="aside-image position-relative" style="background-image: url(images/background/pic-2.png);">
				<img class="img1 move-1" src="{{ url('images/background/pic3.png') }}" alt="">
				<img class="img2 move-2" src="{{ url('images/background/pic4.png') }}" alt="">
				<img class="img3 move-3" src="{{ url('images/background/pic5.png') }}" alt="">
			</div>
		</div>
		<div class="container flex-row-fluid " style="margin-right: 60px">
			<div class="d-flex justify-content-center h-100 " style="margin-right: 60px;margin-top: 40px">
				<div class="authincation-content style-2" style="margin-right: 60px">
					<div class="row no-gutters">
						<br><br>
						<div class="dropdown" style="margin-left: 117%">
							<a class="btn btn-outline-dark" href="{{ route('plans.cart') }}">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
								<span class="badge text-bg-danger">{{ count((array) session('cart')) }}</span>
							</a>
							</div>
							<div class="container mt-4">
								@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
								@endif
							</div>
							<table id="cart" class="table table-hover table-condensed" style="margin-right: 20px">
								<thead>
									<tr>
										<th style="width:50%">Product</th>
										<th style="width:50%">Description</th>
										<th style="width:10%">Price</th>
										<th style="width:8%">Quantity</th>
										
										<th style="width:10%">Action</th>
									</tr>
								</thead>
								<tbody>
									@php $total = 0 @endphp
									@if(session('cart'))
									@foreach(session('cart') as $id => $details)
									@php $total += $details['price'] * $details['quantity'] @endphp
									<tr data-id="{{ $id }}">
										<td data-th="Product">
											<div class="row">
												<div class="col-sm-9">
													<h5 class="nomargin">{{ $details['name'] }}</h5>
													
												</div>
											</div>
										</td>
										<td data-th="Price"><h5 class="nomargin">{{ $details['description'] }}</h5></td>
										<td data-th="Price">${{ $details['price'] }}</td>
										<td data-th="Quantity">
											<input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
										</td>
										
										<td class="actions" data-th="">
											<button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
									@endforeach
									@endif
								</tbody>
								<tfoot >
									<tr >
										<td colspan="5" style="text-align:right;">
											<h3><strong>Total ${{ $total }}</strong></h3>
										</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">
											<form action="/session" method="POST">
												{{-- <a href="{{ url('/plans') }}" class="btn btn-danger" style="margin-right: 10px">
													<i class="fa fa-arrow-left"></i> Continue Shopping
												</a> --}}
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<a href="{{ url('/Checkout') }}" class="btn btn-success">
													Proceed To Checkout <i class="fa fa-arrow-right"></i>
												</a>
											</form>
										</td>
									</tr>
								</tfoot>
							</table>
							</div>
							
							<!--**
								Scripts
							***-->
							<!-- Required vendors -->
							<script src="{{ url('vendor/global/global.min.js') }}"></script>
							<script src="{{ url('js/custom.min.js') }}"></script>
							<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

							<script type="text/javascript">
								// Delete product from cart
								$(".cart_remove").click(function(e) {
								  e.preventDefault();
								  var ele = $(this);
								  
								  if (confirm("Do you really want to delete?")) {
									$.ajax({
									  url: '{{ route('delete.cart.product') }}',
									  method: "DELETE",
									  data: {
										_token: '{{ csrf_token() }}',
										id: ele.parents("tr").attr("data-id")
									  },
									  success: function(response) {
										ele.parents("tr").remove();
										updateTotalPrice(); // Update total price after deleting the product
									  }
									});
								  }
								});
							  
								// Update cart info when quantity changes
								$(".quantity.cart_update").change(function(e) {
								  e.preventDefault();
								  var ele = $(this);
								
								  $.ajax({
									url: '{{ route('update.shopping.cart') }}',
									method: "patch",
									data: {
									  _token: '{{ csrf_token() }}',
									  id: ele.parents("tr").attr("data-id"),
									  quantity: ele.val()
									},
									success: function(response) {
									  window.location.reload();
									}
								  });
								});
							  
								// Function to update the total price
								function updateTotalPrice() {
								  // Logic to update the total price here
								}
							  </script>	
				</div>
			</div>	