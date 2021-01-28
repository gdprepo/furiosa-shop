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


<div style="position: absolute; margin-top: 150px;" class="">
    <div style="margin-left: 8%; margin-right: auto !important;  width: 85%;" class="row">
        <div style="margin-right: 8%" class="col-md-6">

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

            <div style="margin-top: 50px;">
                <div style="display: flex">
                    <strong style="color: white; font-size: 30px; margin-top: 30px; width: 100%" class="mb-4 mt-5">{{ $product->getPrice() }}</strong>
                    <div style="width: 100%" class="buttons">
                        <div style="background: none;" class="containerButton">
                            <a style="background: white;" href="/shop" class="btnPlus effect04" data-sm-link-text="Ajouter" target="_blank"><span>Add</span></a>
                        </div>
                    </div>
                </div>


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