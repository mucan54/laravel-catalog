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
			vertical-align: middle;
			display: table-cell;
		}
		.default-img{
			width: 262px;
			height: 350px;
		}
		.link{
			font-weight:800 !important;
			color: rgb(15, 33, 230) !important;
		}
		.link::before{
			content: 'x    ';
		}

		.accordion{
			background-color: aliceblue;
		}
		@media only screen and (max-width: 750px) {
            #cats{
                display: none;
            }
        }

		@media only screen and (min-width: 750px) {
			.accordion{
				display: none;
			}
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
									<div class="accordion"><h3 class="title">+ MENU</h3></div>
									<div id="cats">
									@php
									$val=RouteFilter::valGenerator(app('request'));
									@endphp
									
									@foreach($attribute as $s_attr)
								<h3 class="title">{{ $s_attr->name }}</h3>
									<ul class="categor-list">
										@foreach($s_attr->attributevalues as $cat)
										@if (isset($val[$s_attr->id]) && in_array($cat->id, $val[$s_attr->id]))
										@php
										$urlpars=RouteFilter::urlParameters($s_attr->id,$cat->id, $val);
										@endphp
											<li><a class='link' href="{!! route('products',['str'=>$urlpars,'search'=>app('request')->input('search')]) !!}">{{$cat->name}}</a></li>
										
											@else
											@php $urlpars = RouteFilter::urlNewParameter($s_attr->id,$cat->id, app('request')); 
											@endphp
										<li><a href="{!! route('products',['str'=>$urlpars,'search'=>app('request')->input('search')]) !!}">{{$cat->name}}</a></li>
										@endif
										@endforeach
									</ul>
									<br />
									<br />
										@endforeach
									</div>
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
									<div >
										<a href="/id/{{$product->id}}">
										@if($product->attachment()->first() !== null)
											<img src="{{ $product->attachment()->first()->url() }}" alt="#">
											@else 
											<img style='width:263px; height:394px' class="default-img" src="no-image.png" alt="#">
										@endif
										
																					
										</a>
									</div>
									<div class="myh3 product-content">
										<a class='mytext' href="/id/{{$product->id}}">{{$product->sku}}</a>
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
	@include('google')
	<script>

		ga('set', 'userId', '{{ Session::get('user_name')}}');

		// Send the custom dimension value with a pageview hit.
		ga('send', 'pageview');

	$(document).ready(function () {
		$('.accordion').on('click', function () {
			$('#cats').slideToggle(500);
		});
	});
	</script>
</body>
</html>