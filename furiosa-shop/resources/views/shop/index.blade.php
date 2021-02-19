@extends('./../layouts/app')


@section('link-extra')

<link rel="stylesheet" href="<?php echo asset('css/shop.css') ?>">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

@endsection

@section('content')

<style>
  .work-info {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-size: 18px;
    font-weight: 700;
    -webkit-animation: fadeIn 1s;
  }

  .gallery_product .work-info {
    position: absolute;

    display: none;
  }

  .gallery_product:hover .work-info {
    display: block;

  }

  .gallery_product:hover {
    -webkit-filter: grayscale(100%) !important;
    filter: grayscale(100%) !important;
  }
</style>



<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

$pageencours = $_SERVER['PHP_SELF'];
$page = $_SERVER['REQUEST_URI'];

?>

@if ($iPhone || $iPad || $iPad || $Android)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 250px;" class="d-block w-100" src="https://via.placeholder.com/900x300" alt="First slide">
      <div class="carousel-caption" style="top: 0%">
        <h1 style="font-size: 20px;">One more for good measure.</h1>
        <p style="font-size: 15px;">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
          gravida at eget.</p>
        <a style="padding: 8; margin: 0; font-size: 15px" class="btn btn-lg btn-primary" href="#portfolio" role="button">Tout les produits</a>
      </div>
    </div>



  </div>

</div>

@else
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 500px;" class="d-block w-100" src="https://via.placeholder.com/900x300" alt="First slide">
      <div class="carousel-caption" style="top: 30%">
        <h1>One more for good measure.</h1>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
          gravida at eget
          metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p><a class="btn btn-lg btn-primary" href="#portfolio" role="button">Browse gallery</a></p>
      </div>
    </div>



  </div>

</div>

@endif

<section class="" id="portfolio">
  <div class="container">
    <div class="gallery col-lg-12 mx-auto" style="z-index: 1;">
      <h1 style="letter-spacing: 3;" class="gallery-title">Gallery Furiosa</h1>
    </div>

    <div style="text-align: center; z-index: 1000; margin-top: 0px;">
      <button class="btn btn-default filter-button active" data-filter="all">All</button>
      @foreach($categories as $category)
      <?php $string = "";
      $string = str_replace(' ', '_', $category->name);  ?>
      <button class="btn btn-default filter-button" data-filter="{{ $string }}">{{ $category->name }}</button>

      @endforeach
        <br>

        <button  class="btn btn-default filter-button" data-filter="petit">Petit</button>
        <button  class="btn btn-default filter-button" data-filter="moyen">Moyen</button>
        <button class="btn btn-default filter-button" data-filter="grand">Grand</button>


    </div>

    <div class="row">

      <?php $index = 0; ?>
      @foreach($products as $product)
      <?php
      $categories = [];
      $string = "";
      foreach ($product->categories as $category) {
        if (str_replace(' ', '_', $category->name)) {
          $string = str_replace(' ', '_', $category->name);
          array_push($categories, $string);
        } else {
          array_push($categories, $category->name);
        }
        // $categories = $category->name;
      }


      $tailles = [];
      $json = (array)json_decode($product->taille);
      foreach ($json as $size) {
        // $categories = $category->name;
        array_push($tailles, $size);
      }

      ?>

      <div class="animate__animated animate__backInRight gallery_product col-md-4 filter center {{ implode(' ', $categories) }} {{ implode(' ', $tailles) }}">
        <a href="/shop/{{ $product->slug }}">

          <div class="work-info">
            <h3 style="font-size: 22px; font-weight: 800">{{ $product->title }}</h3>
            <span>{{ $categories[0] }}<br></span>
            <span>{{ $product->getPrice() }}</span>

          </div>
          <img class="img-fluid img-product" style="width: 100%;" src="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image) : 'https://via.placeholder.com/450x450' }}" alt="">
        </a>

      </div>

      <?php $index++; ?>


      @endforeach

    </div>

  </div>



  <!-- ======= Works Section ======= -->
  <!--

      <?php $index = 0; ?>
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        @if ($iPhone || $iPad || $iPad || $Android)

        @foreach($products as $product)
        @if ($index < 10) <?php
                          $categories = [];
                          foreach ($product->categories as $category) {
                            // $categories = $category->name;
                            array_push($categories, $category->name);
                          }

                          $tailles = [];
                          $json = (array)json_decode($product->taille);
                          foreach ($json as $taille) {
                            // $categories = $category->name;
                            array_push($tailles, $taille);
                          }

                          ?> <div class="item
      {{ implode(' ', $categories) }} {{ implode(' ', $tailles) }}
      
       col-6">
          <a href="/shop/{{ $product->id }}" class="item-wrap fancybox">
            <div class="work-info">
              <h3>{{ $product->title }}</h3>
              <span>{{ $categories[0] }}<br></span>
              <span>{{ $product->getPrice() }}</span>

            </div>
            <img class="img-fluid" src="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}">
          </a>
      </div>
      @endif
      <?php $index++; ?>

      @endforeach



      @else

      @foreach($products as $product)
      @if ($index < 10) <?php
                        $categories = [];
                        foreach ($product->categories as $category) {
                          // $categories = $category->name;
                          array_push($categories, $category->name);
                        }

                        $tailles = [];
                        $json = (array)json_decode($product->taille);
                        foreach ($json as $taille) {
                          // $categories = $category->name;
                          array_push($tailles, $taille);
                        }

                        ?> <div class="item
      {{ implode(' ', $categories) }} {{ implode(' ', $tailles) }}
      
       col-sm-6 col-md-4 col-lg-4 mb-4">
        <a href="/shop/{{ $product->id }}" class="item-wrap fancybox">
          <div class="work-info">
            <h3>{{ $product->title }}</h3>
            <span>{{ $categories[0] }}<br></span>
            <span>{{ $product->getPrice() }}</span>

          </div>
          <img class="img-fluid" src="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}">
        </a>
    </div>
    @endif
    <?php $index++; ?>

    @endforeach

    @endif

                      -->


</section><!-- End  Works Section -->


@endsection


@section('footer')

<!-- ======= Footer ======= -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <p class="mb-1">&copy; Copyright FuriosaAliShop. All Rights Reserved</p>
      </div>
    </div>
</footer>
@endsection


@section('script-extra')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo asset('js/jquery.filterizr.min.js') ?>"></script>
<script src="<?php echo asset('js/popper.min.js') ?>"></script>

<script>
  $(document).ready(function() {

    $('.filter-button').click(function() {
      var value = $(this).attr('data-filter');

      if (value == "all") {
        $(".filter").show('10000');
      } else {
        $(".filter").not('.' + value).hide();
        $(".filter").filter('.' + value).show();
      }

      $(".filter-button").removeClass('active');
      $(this).addClass('active');
    });



  })
</script>

@endsection