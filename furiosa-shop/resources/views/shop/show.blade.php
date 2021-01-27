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
    <div style="margin-left: 8%; margin-right: auto !important; background-color: rgba(0, 0, 0, 0.5); width: 85%; padding: 50px 50px" class="row">
        <div class="col-6">
            <img class="img-fluid" style="width: 80%;" src="{{ $product->image != 'https://via.placeholder.com/450x450' ? asset('uploads/images/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt="{{ $product->title }}">

        </div>
        <div class="col-5">
            <div style="width: 100%">
                <h2 style="font-size: 1.5em" class="mb-4 mt-4">{{ $product->title }}</h2>

            </div>
            @if ($iPhone || $iPad || $iPad || $Android)
            @else
            <span class="mb-5">{!! $product->description !!}<br></span>
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
                <strong style="color: white; font-size: 30px; margin-top: 30px" class="mb-4 mt-5">{{ $product->getPrice() }}</strong>

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