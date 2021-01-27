@extends('layouts.app')



@section('content')
<style>
  .center-con {
    display: flex;
    align-items: center;
    justify-content: center;
    transform: rotate(90deg);
  }


  .round {
    position: absolute;
    border: 2px solid white;
    width: 40px;
    height: 40px;
    border-radius: 100%;

  }

  #cta {
    width: 100%;
    cursor: pointer;
    position: absolute;
  }

  #cta .arrow {
    left: 30%;
    top: 12px
  }

  .arrow {
    position: absolute;
    bottom: 0;
    margin-left: 0;
    width: 12px;
    height: 12px;
    background-size: contain;
    top: 15px;
  }

  .segunda {
    margin-left: 8px;
  }

  .next {
    background-image: url('data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PHN0eWxlPi5zdDB7ZmlsbDojZmZmfTwvc3R5bGU+PHBhdGggY2xhc3M9InN0MCIgZD0iTTMxOS4xIDIxN2MyMC4yIDIwLjIgMTkuOSA1My4yLS42IDczLjdzLTUzLjUgMjAuOC03My43LjZsLTE5MC0xOTBjLTIwLjEtMjAuMi0xOS44LTUzLjIuNy03My43UzEwOSA2LjggMTI5LjEgMjdsMTkwIDE5MHoiLz48cGF0aCBjbGFzcz0ic3QwIiBkPSJNMzE5LjEgMjkwLjVjMjAuMi0yMC4yIDE5LjktNTMuMi0uNi03My43cy01My41LTIwLjgtNzMuNy0uNmwtMTkwIDE5MGMtMjAuMiAyMC4yLTE5LjkgNTMuMi42IDczLjdzNTMuNSAyMC44IDczLjcuNmwxOTAtMTkweiIvPjwvc3ZnPg==');
  }

  @keyframes bounceAlpha {
    0% {
      opacity: 1;
      transform: translateX(0px) scale(1);
    }

    25% {
      opacity: 0;
      transform: translateX(10px) scale(0.9);
    }

    26% {
      opacity: 0;
      transform: translateX(-10px) scale(0.9);
    }

    55% {
      opacity: 1;
      transform: translateX(0px) scale(1);
    }
  }

  .bounceAlpha {
    animation-name: bounceAlpha;
    animation-duration: 1.4s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }

  .arrow.primera.bounceAlpha {
    animation-name: bounceAlpha;
    animation-duration: 1.4s;
    animation-delay: 0.2s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }

  .round:hover .arrow {
    animation-name: bounceAlpha;
    animation-duration: 1.4s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }

  .round:hover .arrow.primera {
    animation-name: bounceAlpha;
    animation-duration: 1.4s;
    animation-delay: 0.2s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }
</style>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php $check = 0 ?>
    @foreach($slider1 as $slider)

    @if($check == 0)

    <div style="max-height: 720px;" class="carousel-item active">
      <img class="d-block w-100" src="{{ $slider->image != 'https://via.placeholder.com/1200x600' ? asset('uploads/images/' .$slider->image ) : 'https://via.placeholder.com/1200x600' }}" alt="First slide">
      <div class="carousel-caption text-right">
        <h1>{{ $slider->title }}</h1>
        <p>{{ $slider->description }}</p>
        <a style="width: 30%; max-width: unset;" class="btn btn-lg btn-primary" href="/shop" role="button">Browse gallery</a>
      </div>
    </div>
    <?php $check++ ?>
    @else
    <div style="max-height: 720px;" class="carousel-item">
      <img class="d-block w-100" src="{{ $slider->image != 'https://via.placeholder.com/1200x600' ? asset('uploads/images/' .$slider->image ) : 'https://via.placeholder.com/1200x600' }}" alt="First slide">
      <div class="carousel-caption text-left">
        <h1>{{ $slider->title }}</h1>
        <p>{{ $slider->description }}</p>
        <p><a class="btn btn-lg btn-primary" href="/contact" role="button">Contact</a></p>
      </div>
    </div>
    @endif
    @endforeach

    <div style="top: 100px; left: 0; z-index: 0" class="carousel-caption d-none d-md-block">
      <div style="margin-left: 15%; width: fit-content; border-left: 5px solid white; padding-left: 15px">
        <h5 style="font-size: 35px; padding: 0; margin: 0; letter-spacing: 5px; ">Nom {{ $user->name}}</h5>
        <p style="font-size: 20px; padding: 0; font-weight: unset;">Peinture / Tatouage</p>
      </div>

    </div>

  </div>
  <a style="z-index: 0;" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a style="z-index: 0;" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <div class="center-con">
    <div style="background-color: black" class="round">
      <div id="cta">
        <span class="arrow primera next "></span>
        <span class="arrow segunda next "></span>
      </div>
    </div>
  </div>
</div>

<section id="shop" style="padding-bottom: 0px;" class="section site-portfolio">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-md-12 col-lg-6 mb-4 mb-lg-0">
        <h2>Hey, I'm Alizee Nom</h2>
        <p class="mb-0">Freelance Creative &amp; Professional Graphics Designer</p>
      </div>
      <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos-delay="100">
        <div id="filters" class="filters">
          <a href="#" data-filter="*" class="active">All</a>
          @foreach($categories as $category)
          <a href="#" data-filter=".{{ $category->name }}">{{ $category->name }}</a>
          @endforeach
        </div>
      </div>
    </div>
    <?php $index = 0; ?>
    <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
      @foreach($products as $product)
      @if ($index < 10) <?php
                        $categories = [];
                        foreach ($product->categories as $category) {
                          // $categories = $category->name;
                          array_push($categories, $category->name);
                        }

                        ?> <div class="item
      {{ implode(' ', $categories) }}
      
       col-sm-6 col-md-4 col-lg-4 mb-4">
        <a href="work-single.html" class="item-wrap fancybox">
          <div class="work-info">
            <h3>{{ $product->title }}</h3>
            <span>{{ $categories[0] }}<br></span>
            <span>{{ $product->getPrice() }}</span>

          </div>
          <img class="img-fluid" src="{{ $product->image != 'https://via.placeholder.com/450x450' ? asset('uploads/images/' .$product->image ) : 'https://via.placeholder.com/450x450' }}">
        </a>
    </div>
    @endif
    <?php $index++; ?>

    @endforeach
    <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
      <a href="work-single.html" class="item-wrap fancybox">
        <div class="work-info">
          <h3>Build Indoo</h3>
          <span>Photography</span>
        </div>
        <img class="img-fluid" src="images/img_2.jpg">
      </a>
    </div>
    <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
      <a href="work-single.html" class="item-wrap fancybox">
        <div class="work-info">
          <h3>Cocooil</h3>
          <span>Branding</span>
        </div>
        <img class="img-fluid" src="images/img_3.jpg">
      </a>
    </div>
    <div class="item design col-sm-6 col-md-4 col-lg-4 mb-4">
      <a href="work-single.html" class="item-wrap fancybox">
        <div class="work-info">
          <h3>Nike Shoe</h3>
          <span>Design</span>
        </div>
        <img class="img-fluid" src="images/img_4.jpg">
      </a>
    </div>
    <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
      <a href="work-single.html" class="item-wrap fancybox">
        <div class="work-info">
          <h3>Kitchen Sink</h3>
          <span>Photography</span>
        </div>
        <img class="img-fluid" src="images/img_5.jpg">
      </a>
    </div>
    <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
      <a href="work-single.html" class="item-wrap fancybox">
        <div class="work-info">
          <h3>Amazon</h3>
          <span>brandingn</span>
        </div>
        <img class="img-fluid" src="images/img_6.jpg">
      </a>
    </div>
  </div>
  </div>
  <div class="buttons">
    <div class="containerButton">
      <a href="/shop" class="btnPlus effect04" data-sm-link-text="+" target="_blank"><span>En voir plus</span></a>
    </div>
  </div>

</section><!-- End  Works Section -->




<div class="container marketing">

  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span>
      </h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
        commodo.</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_176dec3d002%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_176dec3d002%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.1171875%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
    </div>
  </div>


  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div>

@endsection

@section('footer')

<!-- ======= Footer ======= -->
<footer class="footer" role="contentinfo">
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
          Designed by <a href="https://www.gd-cvonline.site/">DepaireDesign -</a><a href="https://bootstrapmade.com/"> BootstrapMade</a>
        </div>
      </div>
      <div class="col-sm-6 social text-md-right">
        <a href="#"><span class="icofont-twitter"></span></a>
        <a href="#"><span class="icofont-facebook"></span></a>
        <a href="#"><span class="icofont-dribbble"></span></a>
        <a href="#"><span class="icofont-behance"></span></a>
      </div>
    </div>
  </div>
</footer>
@endsection

@section('script-extra')

<script>
  $('.round').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    $('.arrow').toggleClass('bounceAlpha');
    $(window).scrollTop($('#shop').offset().top);

  });
</script>

@endsection