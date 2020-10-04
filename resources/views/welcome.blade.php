<!DOCTYPE html>
<html lang="tr">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Rosetta Stone Atelier</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/css/site/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/site/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="/css/site/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="/css/site/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="/css/site/themify-icons.css">
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="/css/site/jquery-ui.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="/css/site/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="/css/site/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/css/site/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/site/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="/css/site/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="/css/site/reset.css">
	<link rel="stylesheet" href="/css/site/style.css">
    <link rel="stylesheet" href="/css/site/responsive.css">

	<style>

		.single-product{
			background-color: rgb(173, 173, 173);
		}
		.myh3{
			font-size: 18px !important;
		text-align: center;
		padding: 5px;
		color: rgb(255, 255, 255);
		}

		.mytext{
			text-align: center;
		}

		.product-content{
			margin-top: 20px;
			height: 70px;
			vertical-align: middle;
			display: table-cell;
		}
	</style>
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		@include('header')
		<!-- Header -->
		
		<!--/ End Header -->
		
		<!-- Breadcrumbs -->
		@include('breadcrumb')
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Kategoriler</h3>
									<ul class="categor-list">
										@foreach($category as $cat)
									    <li><a href="{!! route('products',['cat'=>$cat->id,'search'=>app('request')->input('search')]) !!}">{{$cat->name}}</a></li>
										@endforeach
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->

									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							
							@foreach($products as $product)
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="/id/{{$product->id}}">
										<img class="default-img" src="{{$product->attachment()->first()->url()}}" alt="#">
											
										</a>
									</div>
									<div class="myh3 product-content">
										<a class='mytext' href="/id/{{$product->id}}">{{$product->name}}</a>
									</div>
								</div>
							</div>
							@endforeach
							
							
						</div>
						<div class="pagination">
							{{ $products->appends(request()->except('page'))->render() }} 
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

		<!-- Start Shop Newsletter  -->

		<!-- End Shop Newsletter -->
		
		
		
		<!-- Modal -->
			
			<!-- Modal end -->
		
		<!-- Start Footer Area -->
		
		<!-- /End Footer Area -->
	
	
    <!-- Jquery -->
    <script src="/js/site/jquery.min.js"></script>
    <script src="/js/site/jquery-migrate-3.0.0.js"></script>
	<script src="/js/site/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="/js/site/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="/js/site/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="/js/site/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="/js/site/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="/js/site/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="/js/site/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="/js/site/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="/js/site/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="/js/site/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="/js/site/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="/js/site/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="/js/site/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="/js/site/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="/js/site/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="/js/site/easing.js"></script>
	<!-- Active JS -->
	<script src="/js/site/active.js"></script>
</body>
</html>