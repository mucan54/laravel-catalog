<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<style>


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

<div class="container">
    <div class="row"><img style='width:100%;' src="{{ $projects->hero() }}"></div>
    <div class="row">
        <div class="col-sm-8 parent owl-theme">

            @foreach($projects->attachment()->get() as $item)
                    <img class='img nomobile' src="{{ $item->url }}">
                     @endforeach
             <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($projects->attachment()->get() as $item)
                    <div class="swiper-slide"><img class='img' src="{{ $item->url }}"></div>
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
    <h1 style='text-align:center; padding:10px; background: beige;' >{{$projects->name}}</h1>
        <div class="col-sm-3" style='background: rgba(220, 140, 246, 0.03);'>{!! $projects->body !!} </div>
    <div class="row"></div>
</div>
<script>
var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
})
</script>