@extends('./../layouts/app')

@section('content')

<style>
    input {
        box-shadow: inset 1px 2px 8px rgba(0, 0, 0, 0.07);
        background: #fff;
        color: #525865;
        border-radius: 4px;
        border: 1px solid #d1d1d1;
    }
</style>

<section style="padding-top: 150px" class="section pb-5">
    <div class="container">

        <div class="row mb-5 align-items-end">
            <div class="col-md-6" data-aos="fade-up">
                <h2>Contact</h2>
                <p style="color: black" class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus incidunt ut
                    officiis explicabo inventore.
                </p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">

                <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name">Suject</label>
                            <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" cols="30" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                            <div class="validate"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="submit" class="readmore d-block w-100" value="Envoyer Message">
                        </div>
                    </div>

                </form>

            </div>

            <div class="col-md-4 ml-auto order-2" data-aos="fade-up">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <strong class="d-block mb-1">Addresse</strong>
                        <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
                    </li>
                    <li class="mb-3">
                        <strong class="d-block mb-1">Telephone</strong>
                        <span>+1 232 3235 324</span>
                    </li>
                    <li class="mb-3">
                        <strong class="d-block mb-1">Email</strong>
                        <span>youremail@domain.com</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>

</section>


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