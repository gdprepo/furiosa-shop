@extends('./../layouts/app')

@section('content')

<?php

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");


$pageencours = $_SERVER['REQUEST_URI'];

?>

<style>
    .dropdown {
        width: 100%;
        max-width: 47.5rem;
        margin: 5rem auto;
        position: relative;
        color: white;
        text-transform: uppercase;
        font-size: 1.8rem;
        font-weight: bold;
        border-radius: 4px;
    }

    .dropdown__select {
        border-radius: inherit;
    }

    .dropdown__list {
        margin-top: 2.5rem;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        display: none;
    }

    .dropdown__list:before {
        content: "";
        height: 2.5rem;
        position: absolute;
        left: 0;
        right: 0;
        background-color: transparent;
        transform: translateY(-100%);
    }

    .dropdown:hover .dropdown__list {
        display: block;
    }

    .dropdown__select,
    .dropdown__item {
        width: 100%;
        padding: 3rem;
        background-color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
    }

    .dropdown__item {
        transition: background-color 0.2s linear;
    }

    .dropdown__item:first-child {
        border-radius: 4px 4px 0 0;
        position: relative;
    }

    .dropdown__item:first-child:before {
        content: "";
        position: absolute;
        top: 0;
        left: 3rem;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid var(--primary);
        transform: translateY(-100%);
        transition: border-color 0.2s linear;
    }

    .dropdown__item:first-child:hover:before {
        border-bottom-color: var(--secondary);
    }

    .dropdown__item:last-child {
        border-radius: 0 0 4px 4px;
    }

    .dropdown__item:hover {
        background-color: grey;
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

@if ($iPhone || $Android)

<div style="position: absolute; width: 100%; display: contents; margin-top: 50px" class="container">
    @if (session('success'))
    <div style="padding-top: 50px;">
        <div style="width: 80%; margin-left: 10%; margin-right: auto;" class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>

    @endif
    <div style="margin-left: 8%; width: 85%; margin-right: auto !important; margin-top: 50px; display: absolute" class="">

        <div style="padding: 0; z-index: 10000" class="col-12">

            <figure id="mainImg" style="width: 100%; height: 300px" class="zoo-item" data-zoo-image="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}"></figure>


        </div>


        <div style="padding-top: 300px" class="col-12">

            <div class="row" style="margin-top: 30px; margin-left: -5%;">
                <img class="img-thumbnail img-fluid col-4" style="width: 100%; padding: 2px; max-height: 100px" src="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt=""> </a>

                <?php

                foreach ($product->images as $image) {
                ?>


                    <img class="img-thumbnail img-fluid col-4" style="width: 100%; padding: 2px; max-height: 100px" src="{{ file_exists(public_path('uploads/products/' .$image->name)) ? asset('uploads/products/' .$image->name ) : 'https://via.placeholder.com/450x450' }}" alt=""> </a>

                <?php } ?>


            </div>
            <div style="width: 100%">
                <h2 style="font-size: 1.5em; color: white;" class="mb-4 mt-4">{{ $product->title }}</h2>

            </div>

            <!-- 
  
            <div style="margin-bottom: 20px; z-index: 800" class="row">
                <strong style="font-size: 2.0em; margin-left: 15px; margin-right: -10px; margin-top: 2px" class="col-6 mb-4 display-4 text-secondary">{{ $product->getPrice() }}</strong>

                <div class="col-3" style="margin-left: -10px;">
                    <a href="https://www.instagram.com/atelier.bijoux.depaire/">
                        <img style="width: 80%" src="{{ asset('images/icons/instagram.png') }}" alt="Marie depaire instagram, atelier depaire instagram md atelier bijoux md atelier, marie depaire atelier">
                    </a>
                </div>
                <div style="margin-left: -20px" class="col-3">
                    <a href="https://www.facebook.com/mariedepairebijoux/">
                        <img style="width: 80%" src="{{ asset('images/icons/facebook.png') }}" alt="Marie depaire instagram, atelier depaire instagram md atelier bijoux md atelier, marie depaire atelier">
                    </a>
                </div>

            </div>
  </form> -->
            <span style="margin-top: 20px; margin-bottom: 0px; color: white">{!! $product->description !!}</span>

            <form style="z-index: 800" action="{{ route('cart.store') }}" method="POST">

                <div style="margin-top: 30px;">

                    <div style="display: block">
                        <strong style="color: white; font-size: 30px; margin-top: -5px; width: 100%; margin-bottom: 20px" class="">{{ $product->getPrice() }} <br> </strong>

                        <select style="width: 100%; margin-top: 20px" name="taille" class="form-control rounded-1" id="select" required>
                            <option value="">Choisir une taille</option>
                            @if ($product->taille != [])
                            <?php $json = (array)json_decode($product->taille) ?>
                            @foreach($json as $obj)
                            <option>{{ $obj }}</option>

                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div style="width: 100%; float:left; display: unset" class="buttons">
                        <div style="background: none;" class="containerButton">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">

                            <!-- <a style="background: white; float: left" type="submit" class="btnPlus effect04" data-sm-link-text="Au panier" target="_blank"><span>Ajouter</span></a> -->
                            <button style="width: 120%; background-color: white; border: black; color: black; padding: 10px; margin: 0" type="submit" class="btn btn-success mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>

                        </div>
                    </div>

            </form>


            <!-- </form> -->



        </div>



    </div>

</div>


</div>

</div>

</div>

@elseif ($iPad )


<div style="position: absolute; width: 100%; display: contents; margin-top: 50px" class="container">
    @if (session('success'))
    <div style="padding-top: 50px;">
        <div style="width: 80%; margin-left: 10%; margin-right: auto;" class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>

    @endif
    <div style="margin-left: 8%; width: 85%; margin-right: auto !important; margin-top: 50px; display: absolute" class="">

        <div style="padding: 0; z-index: 10000" class="col-12">

            <figure id="mainImg" style="width: 100%; height: 500px" class="zoo-item" data-zoo-image="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}"></figure>


        </div>


        <div style="padding-top: 500px" class="col-12">

            <div class="row" style="margin-top: 30px; width: 60%">
                <img class="img-thumbnail img-fluid col-4" style="width: 100%; padding: 2px; height: 130px " src="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt=""> </a>

                <?php

                foreach ($product->images as $image) {
                ?>


                    <img class="img-thumbnail img-fluid col-4" style="width: 100%; padding: 2px; height: 130px" src="{{ file_exists(public_path('uploads/products/' .$image->name)) ? asset('uploads/products/' .$image->name ) : 'https://via.placeholder.com/450x450' }}" alt=""> </a>

                <?php } ?>


            </div>



            <!-- </form> -->



        </div>

        <div>




            <form style="z-index: 800" action="{{ route('cart.store') }}" method="POST">
                <div class="row" style="width: 100%">

                    <div class="col-7">
                        <h2 style="font-size: 2em; color: white;" class="mb-4 mt-4">{{ $product->title }}</h2>

                        <span style="margin-top: 20px; margin-bottom: 0px; color: white">{!! $product->description !!}</span>



                    </div>
                    <div class="col-5" style="margin-top: 30px;">

                        <div style="display: block">
                            <strong style="color: white; font-size: 30px; margin-top: -5px; width: 50%; margin-bottom: 20px" class="">{{ $product->getPrice() }} <br> </strong>

                            <select style="width: 100%; margin-top: 20px" name="taille" class="form-control rounded-1" id="select" required>
                                <option value="">Choisir une taille</option>
                                @if ($product->taille != [])
                                <?php $json = (array)json_decode($product->taille) ?>
                                @foreach($json as $obj)
                                <option>{{ $obj }}</option>

                                @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                    <div style="width: 100%; float:right; display: unset" class="buttons col-6">
                        <div style="background: none;" class="containerButton">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">

                            <!-- <a style="background: white; float: left" type="submit" class="btnPlus effect04" data-sm-link-text="Au panier" target="_blank"><span>Ajouter</span></a> -->
                            <button style="width: 310px; background-color: white; border: black; color: black; padding: 15px; margin: 0; font-size: 20px" type="submit" class="btn btn-success mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>

                        </div>
                    </div>
            </form>

        </div>



    </div>

</div>


</div>

</div>

</div>



@else

<div style="position: absolute; margin-top: 150px; width: 100%; display: contents; margin-top: 130px" class="container">
    @if (session('success'))
    <div style="padding-top: 100px; margin-bottom: -50px">
        <div style="width: 80%; margin-left: 10%; margin-right: auto;" class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>

    @endif
    <div style="margin-left: 8%; width: 85%; margin-right: auto !important; margin-top: 100px; display: -webkit-inline-flex" class="grix xs2">

        <div style="margin-right: 8%" class="col-md-5">

            <figure id="mainImg" style="width: 100%;" class="zoo-item" data-zoo-image="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}"></figure>


        </div>
        <div class="col-5">
            <div style="width: 100%">
                <h2 style="font-size: 1.5em; color: white;" class="mb-4 mt-4">{{ $product->title }}</h2>

            </div>
            @if ($iPhone || $iPad || $iPad || $Android)
            @else
            <span style="color: white;" class="mb-5">{!! $product->description !!}<br></span>
            @endif

            @if ($iPhone || $iPad || $iPad || $Android)
            <div style="margin-bottom: 20px; z-index: 800" class="row">
                <strong style="font-size: 2.0em; margin-left: 15px; margin-right: -10px; margin-top: 2px" class="col-6 mb-4 display-4 text-secondary">{{ $product->getPrice() }}</strong>

                <div class="col-3" style="margin-left: -10px;">
                    <a href="https://www.instagram.com/atelier.bijoux.depaire/">
                        <img style="width: 80%" src="{{ asset('images/icons/instagram.png') }}" alt="Marie depaire instagram, atelier depaire instagram md atelier bijoux md atelier, marie depaire atelier">
                    </a>
                </div>
                <div style="margin-left: -20px" class="col-3">
                    <a href="https://www.facebook.com/mariedepairebijoux/">
                        <img style="width: 80%" src="{{ asset('images/icons/facebook.png') }}" alt="Marie depaire instagram, atelier depaire instagram md atelier bijoux md atelier, marie depaire atelier">
                    </a>
                </div>

            </div>
            @else
            <form style="z-index: 800" action="{{ route('cart.store') }}" method="POST">

                <div style="margin-top: 50px;">
                    <!-- <form action=""> -->
                    <div style="display: flex">
                        <strong style="color: white; font-size: 30px; margin-top: -5px; width: 100%" class="mb-4">{{ $product->getPrice() }}</strong>

                        <select style="width: 100%;" name="taille" class="form-control rounded-1" id="select" required>
                            <option value="">Choisir une taille</option>
                            @if ($product->taille != [])
                            <?php $json = (array)json_decode($product->taille) ?>
                            @foreach($json as $obj)
                            <option>{{ $obj }}</option>

                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div style="width: 100%; float:left; display: unset" class="buttons">
                        <div style="background: none;" class="containerButton">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">

                            <!-- <a style="background: white; float: left" type="submit" class="btnPlus effect04" data-sm-link-text="Au panier" target="_blank"><span>Ajouter</span></a> -->
                            <button style="width: 100%; background-color: white; border: black; color: black; padding: 10px" type="submit" class="btn btn-success mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>

                        </div>
                    </div>

            </form>


            <!-- </form> -->


            <div style="margin-top: 50px; margin-left: -5%;">
                <img class="img-thumbnail img-fluid" style=" max-height: 100px" src="{{ file_exists(public_path('uploads/products/' .$product->image)) ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt=""> </a>

                <?php

                foreach ($product->images as $image) {
                ?>


                    <img class="img-thumbnail" style="max-height: 100px" src="{{ file_exists(public_path('uploads/products/' .$image->name)) ? asset('uploads/products/' .$image->name ) : 'https://via.placeholder.com/450x450' }}" alt=""> </a>

                <?php } ?>


            </div>
        </div>

        @endif
        @if ($iPhone || $iPad || $iPad || $Android)
        <span style="margin-top: 20px; margin-bottom: 0px">{!! $product->description !!}</span>
        @endif

    </div>

</div>


</div>

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
                    Designed by <a href="https://www.gd-cvonline.site/">DepaireDesign -</a><a href="https://bootstrapmade.com/"> BootstrapMade</a>
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

@section('script-extra')
<script src="<?php echo asset('js/zoom.js') ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.2.1/zoomove.min.js"></script>
<script>
    $('.zoo-item').ZooMove();

    $(document).ready(function() {

        var thumbnails = document.querySelectorAll('.img-thumbnail');
        var mainImg = document.getElementById('mainImg');
        var img = document.getElementsByClassName('zoo-item');


        thumbnails.forEach((element) => element.addEventListener('click', changeImg));

        function changeImg(e) {
            // mainImg.innerHTML = '';
            mainImg.setAttribute('data-zoo-image', this.src);
            // $( ".zoo-item" ).remove();
            $('.zoo-img').css('background-image', 'url("' + this.src + '")');
            // $('.zoo-item').ZooMove();

            // $('.zoo-item').ZooMove();

            // document.getElementById("linkImg").setAttribute("href", this.src);
        }
    })
</script>

@endsection