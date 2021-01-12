@extends('layouts.app')



@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div style="max-height: 600px;" class="carousel-item active">
      <img src="{{ asset('uploads/images/' .$slider1->image ) }}" alt="First slide">
      <div class="carousel-caption text-right">
        <h1>{{ $slider1->title }}</h1>
        <p>{{ $slider1->description }}</p>
        <a style="width: 30%; max-width: unset;" class="btn btn-lg btn-primary" href="/shop" role="button">Browse gallery</a>
      </div>
    </div>
    <div style="max-height: 600px;" class="carousel-item">
      <img class="d-block w-100" src="https://via.placeholder.com/1200x600" alt="First slide">
      <div class="carousel-caption text-left">
        <h1>One more for good measure.</h1>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
          metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p><a class="btn btn-lg btn-primary" href="/contact" role="button">Contact</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://via.placeholder.com/1200x600" alt="First slide">
      <div class="carousel-caption text-right">
        <h1>One more for good measure.</h1>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
          metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p><a class="btn btn-lg btn-primary" href="/shop" role="button">Browse gallery</a></p>
      </div>
    </div>
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
</div>

<section style="padding-bottom: 0px;" class="section site-portfolio">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
        <h2>Hey, I'm Alizee Nom</h2>
        <p class="mb-0">Freelance Creative &amp; Professional Graphics Designer</p>
      </div>
      <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
        <div id="filters" class="filters">
          <a href="#" data-filter="*" class="active">All</a>
          <a href="#" data-filter=".web">Web</a>
          <a href="#" data-filter=".design">Design</a>
          <a href="#" data-filter=".branding">Branding</a>
          <a href="#" data-filter=".photography">Photography</a>
        </div>
      </div>
    </div>
    <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
      <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
        <a href="work-single.html" class="item-wrap fancybox">
          <div class="work-info">
            <h3>Boxed Water</h3>
            <span>Web</span>
          </div>
          <img class="img-fluid" src="images/img_1.jpg">
        </a>
      </div>
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