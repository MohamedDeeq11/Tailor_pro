<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#5076db" />
    <title>Tailor-pro</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" >
    <!-- Font Awesome all.css file -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Color stylesheet -->
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Background stylesheet -->
    <link id="plan-background" rel="stylesheet" href="assets/css/background-1.css" media="screen">
    <!-- Shape stylesheet -->
    <link id="plan-shape" rel="stylesheet" href="assets/css/shape-1.css" media="screen">
    <!-- style sheet -->
    <link href="assets/css/pricing-style.css" rel="stylesheet">
    <!-- responsive style sheet -->
    <link href="assets/css/pricing-responsive.css" rel="stylesheet">
</head>
<body>
<div class="content-body" style="min-height: 798px;">
    <div class="container-fluid">
        <section class="package_sec">
            <div class="container">
                <h2 class="global_title white">Packages</h2>
                <div class="container mt-4">
                        <div class="dropdown" style="margin-left: 88%" >
            <a class="btn btn-outline-dark" href="{{ route('plans.cart') }}" >
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
              <span class="badge text-bg-danger">{{ count((array) session('cart')) }}</span>
             </a>
        </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <br><br>
                <div class="owl-carousel package_slider">
                    @foreach ($plans as $plan)
                    <!-- Single Plan -->
                    <div class="item">
                        <div class="package_block">
                            <h3>{{ $plan->name }}</h3>
                            <div class="price">{{ $plan->price }}<small>/month</small> </div>
                            <ul class="package_list">
                                <li><i class="fa fa-check" aria-hidden="true"></i>  {{ $plan->description }}</li>
                                
                            </ul>
                            <div class="btn-block text-center">
                                <a href="{{ route('addplan.to.cart', $plan->id) }}" class="buy_btn radial-out">Buy Now</a>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-3ou4y6o8rBzTQgQC4M3g9v4f6e3/qhM6lbA0O56GGnBbllScU+Sp/H70YL5By/1Q" crossorigin="anonymous"></script>
                        @yield('scripts')
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-3ou4y6o8rBzTQgQC4M3g9v4f6e3/qhM6lbA0O56GGnBbllScU+Sp/H70YL5By/1Q" crossorigin="anonymous"></script>
</div>
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="assets/js/owl.carousel.js"></script>
<!-- Pricing Script JS -->
<script src="assets/js/pricing-script.js"></script>
</body>
</html>