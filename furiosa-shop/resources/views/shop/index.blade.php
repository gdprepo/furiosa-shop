@extends('./../layouts/app')


@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height: 500px;" class="d-block w-100" src="https://via.placeholder.com/900x300" alt="First slide">
      <div class="carousel-caption" style="top: 30%">
        <h1>One more for good measure.</h1>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
          gravida at eget
          metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p><a class="btn btn-lg btn-primary" href="#products" role="button">Browse gallery</a></p>
      </div>
    </div>



  </div>

</div>
<!-- ======= Works Section ======= -->
<section id="products" class="section site-portfolio">
  <div class="container">
    <div class="row mb-5 align-items-center">

      <div class="col-md-12" style="text-align:center" data-aos="fade-up" data-aos-delay="100">

        <div id="filters" class="filters">
          <a href="#" data-filter="*" class="active">All</a>
          <a href="#" data-filter=".web">Web</a>
          <a href="#" data-filter=".design">Design</a>
          <a href="#" data-filter=".branding">Branding</a>
          <a href="#" data-filter=".photography">Photography</a>
          <select id="filters2" class="filters" aria-label="Default select example">

            <option value="" selected>Choisir une taille</option>
            <option value=".petit">Petit</option>
            <option value=".moyen">Moyen</option>
            <option value=".grand">Grand</option>
          </select>
        </div>
      </div>
    </div>
    <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
      <div class="item web petit col-sm-6 col-md-4 col-lg-4 mb-4">
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
      <div class="item petit branding col-sm-6 col-md-4 col-lg-4 mb-4">
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
</section><!-- End  Works Section -->


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