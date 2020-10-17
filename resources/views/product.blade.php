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
<title>Rosetta Stone Atelier - {{$projects->sku}}</title>
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
    <link type="text/css" rel="stylesheet" href="/light/css/lightGallery.css" /> 


<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="/css/site/reset.css">
	<link rel="stylesheet" href="/css/site/style.css">
    <link rel="stylesheet" href="/css/site/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .image-link{
            display: contents;
        }


        @media only screen and (min-width: 750px) {
            .swiper-container{
                display: none;
            }
            .parent{
                width: 66.66666667%;
        display: table;
            }
        
            .img{
                width: 50%;
        padding: 5px;
            }
        }
        
        @media only screen and (max-width: 750px) {
            .nomobile{
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
		
		<!-- Header -->
		@include('header')
		<!--/ End Header -->
		
		<!-- Breadcrumbs -->
		@include('breadcrumb', ['sayfa' => $projects->sku])
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
                @if($projects->myhero)
                <div class="row"><img style='width: 100%;height: 100%;padding-bottom: 100px;' src="{{ $projects->myhero->url }}"></div>
                @endif
                <div class="row">
                    <div class="col-sm-8 parent owl-theme">
            
                        <div id='myimages' style='display: contents;'>
                        @foreach($projects->attachment()->get() as $item)
                        <a class='image-link' href='{{ $item->url }}'>
                                <img class='img nomobile' src="{{ $item->url }}">
                        </a>
                                 @endforeach
                        </div>
                         <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach($projects->attachment()->get() as $item)
                                <div class="swiper-slide"><img style='max-width:100%;' src="{{ $item->url }}"></div>
                                 @endforeach
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                
					<div class="col-sm-3" style='background: rgba(220, 140, 246, 0.03);'><h1 style='text-align:center; padding:10px; background: beige;' >{{$projects->sku}}</h1>
						{!! $projects->body !!} 
					<hr>
					@include('attributes')
					</div>
						
                <div class="row"></div>
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


    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script src="/light/js/lightgallery.min.js"></script>

    <!-- lightgallery plugins -->
    <script src="/light/js/lg-thumbnail.min.js"></script>
    <script src="/light/js/lg-fullscreen.min.js"></script>
    <script src="/light/js/zoom.js"></script>
    <script src="/light/js/fullscreen.js"></script>
    <script src="/light/js/thumbnail.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120508683-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('set', {'user_id': 'esat'});
gtag('set', {'product': 'RS0001'});
gtag('config', 'UA-120508683-2');
</script>

<script>
	$(document).ready(function() {
    $('.image-link').click(function(){
        $('#scrollUp').hide();
    });

   $("#myimages").lightGallery(); 
});
 
 
    </script>
</body>
</html>