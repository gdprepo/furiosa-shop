@extends('./../layouts/app')

@section('content')

<?php
    $iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
    $webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

    $pageencours = $_SERVER['PHP_SELF'];
    $page = $_SERVER['REQUEST_URI'];

?>

<style>
    input {
        box-shadow: inset 1px 2px 8px rgba(0, 0, 0, 0.07);
        background: #fff;
        color: #525865;
        border-radius: 4px;
        border: 1px solid #d1d1d1;
    }
</style>

@if ($iPhone || $iPad || $iPad || $Android)


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 200px;" class="d-block w-100" src="{{ file_exists(public_path('uploads/images/' .$about->image)) ? asset('uploads/images/' .$about->image) : 'https://via.placeholder.com/900x300' }}" alt="First slide">
      <div class="carousel-caption" style="top: 20%">
        <h1 style="letter-spacing: 5px">{{ $about->title }}</h1>
      </div>
    </div>



  </div>

</div>

<div class="container">

    <div style="margin-top: -30px;" class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr style="margin-bottom: 30px" class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">{{ $about->text }}
          </h2>
          <p style="font-size: 15px;" class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
            semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
            style="width: 500px; height: 500px;"
            src="{{ file_exists(public_path('uploads/images/' .$about->img_profile)) ? asset('uploads/images/' .$about->img_profile) : 'https://via.placeholder.com/500x500' }}"
            data-holder-rendered="true">
        </div>
      </div>

      
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div>
    
</div>



@else 


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 500px;" class="d-block w-100" src="{{ file_exists(public_path('uploads/images/' .$about->image)) ? asset('uploads/images/' .$about->image) : 'https://via.placeholder.com/900x300' }}" alt="Furiosali la rochelle about art design tableau tatouage {{ $about->title }}">
      <div class="carousel-caption" style="top: 40%">
        <h1 style="letter-spacing: 5px">{{ $about->title }}</h1>
      </div>
    </div>



  </div>

</div>

<div style="margin-bottom: 150px" class="container mt-3">

    <div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">{{ $about->text }}
          </h2>
          <p class="lead">{{ $about->description }}</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
            style="width: 500px; height: 500px;"
            src="{{ file_exists(public_path('uploads/images/' .$about->img_profile)) ? asset('uploads/images/' .$about->img_profile) : 'https://via.placeholder.com/500x500' }}"
            data-holder-rendered="true">
        </div>
      </div>

      
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div>
    
</div>

@endif




@endsection


@section('footer')

<!-- ======= Footer ======= -->
<footer style="background-color: rgba(255, 255, 255, 0.34); margin-top: 150px; padding-top: 50px;" class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="mb-1">&copy; Copyright FuriosaAliShop. All Rights Reserved</p>
                <div class="credits">
                    <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=MyPortfolio
        -->
                    Designed by <a href="https://www.gd-cvonline.site/">DepaireDesign</a>
                </div>
            </div>
            <div class="col-sm-6 social text-md-right">
                <a href="#"><span class="icofont-facebook"></span></a>
                <a href="#"><span style="font-size: large;" class="fab fa-instagram"></span></a>
            </div>
        </div>
    </div>
</footer>

@endsection