@extends('layouts.app')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

$pageencours = $_SERVER['PHP_SELF'];
$page = $_SERVER['REQUEST_URI'];


?>

@section('content')

@if ($iPhone || $iPad || $iPad || $Android)

@if (Cart::count() > 0)
<div class="px-4" style="margin-top: -100px">
    <div class="">
        <div class="">
            <div class="row">
                <div class="bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->
                    <div style="float:left; overflow-x: none" class="">
                        <table style="float: left;" class="table">
                            <thead style="font-size: x-small">
                                <tr>
                                    <th style="padding: .3rem" scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Produit</div>
                                    </th>
                                    <th style="padding: .3rem" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Prix</div>
                                    </th>
                                    <th style="padding: .3rem" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantité</div>
                                    </th>
                                    <th style="padding: .3rem" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Supprimer</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{ asset('uploads/products/' . $product->model->image) }}" alt="{{ $product->model->image }}" title="Produit Atelier Depaire - Marie Depaire La Rochelle" width="70" class="img-fluid rounded shadow-sm">
                                            <div style="margin: 0px !important" class="ml-3 d-inline-block align-middle">
                                                <h5 style="font-size: smaller" class="mb-0"> <a href="{{ route('products.show', ['slug' => $product->model->slug]) }}" class="text-dark d-inline-block align-middle">{{ $product->model->title }}
                                                        @if ($product->options != "[]")
                                                        - {{ $product->options }}
                                                        @endif

                                                    </a></h5>
                                                <!-- <span class="text-muted font-weight-normal font-italic d-block">Catégories: @foreach ($product->model->categories as $category)
                                                    {{ $category->name }}{{ $loop->last ? '' : ', '}}
                                                @endforeach</span> -->
                                            </div>
                                        </div>
                                    </th>
                                    <td style="padding: 0px; width: 20%" class="border-0 align-middle"><strong>{{ getPrice($product->subtotal()) }}</strong></td>
                                    <td class="border-0 align-middle">
                                        <select style="padding: 5px;" class="custom-select" name="qty" id="qty" data-id="{{ $product->rowId }}">
                                            @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                                {{ $i }}
                                                </option>
                                                @endfor
                                        </select>
                                    </td>
                                    <td class="border-0 align-middle">
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="width: 80%"><i style="font:normal normal normal 14px/1 FontAwesome;" class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <div style="display: block;" class="row bg-white rounded shadow-sm">

                <div class="col-md-6" style="padding-bottom: 30px">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande
                    </div>
                    <div class="">
                        <p class="font-italic mb-4">Les frais éventuels de livraison seront calculés suivant les informations que vous avez transmises.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ getPrice(Cart::subtotal()) }}</strong></li>

                            @if (getPrice(Cart::subtotal()) >= 59.99)
                            <li class="d-flex justify-content-between py-3"><strong class="text-muted">Livraison</strong><strong> 4.99 € </strong></li>
                            <li style="color: green" class="d-flex justify-content-between py-3 border-bottom"><strong>livraison gratuite</strong><strong>- 4.99 € </strong></li>

                            @else
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Livraison</strong><strong> 4.99 € </strong></li>

                            @endif

                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{ getPrice(Cart::total() + 499) }}</h5>
                            </li>
                        </ul><a href="{{ route('cart.index') }}" class="btn btn-dark rounded-pill py-2 btn-block"><i class="fa fa-credit-card" aria-hidden="true"></i> Payer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-md-12" style="margin-top: -100px">
    <h5>Votre panier est vide pour le moment.</h5>
    <p>Mais vous pouvez visiter la <a href="{{ route('cart.index') }}">boutique</a> pour faire votre shopping.
    </p>
</div>
@endif

@else



@if (Cart::count() > 0)
<div class="px-4 px-lg-0" style="padding-top: 100px">

    <div class="pb-5">
        <div class="container">

            <div class="row">
                <a style="margin: 15px; margin-bottom:10px; color: black" href="https://www.atelierdepaire.fr/boutique">Continuer le shopping</a>

                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->

                    <div class="table-responsive">

                        <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Produit</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Prix</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantité</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Supprimer</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{ asset('uploads/products/' . $product->model->image) }}" alt="{{ $product->model->image }}" title="Produit Atelier Depaire - Marie Depaire La Rochelle" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="{{ route('produit.show', ['id' => $product->model->id]) }}" class="text-dark d-inline-block align-middle">{{ $product->model->title }}
                                                        @if ($product->options != "[]" && $product->options != "[null]")
                                                        - {{ $product->options }}
                                                        @endif

                                                    </a></h5>
                                                <span class="text-muted font-weight-normal font-italic d-block">Catégories: @foreach ($product->model->categories as $category)
                                                    {{ $category->name }}{{ $loop->last ? '' : ', '}}
                                                    @endforeach</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{ getPrice(floatval($product->subtotal())* 1000) }}</strong></td>
                                    <td class="border-0 align-middle">
                                        <select class="custom-select" name="qty" id="qty" data-id="{{ $product->rowId }}">
                                            @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                                {{ $i }}
                                                </option>
                                                @endfor
                                        </select>
                                    </td>
                                    <td class="border-0 align-middle">
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="width: 80%" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <div class="row p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande
                    </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Les frais éventuels de livraison seront calculés suivant les informations que vous avez transmises.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ getPrice(floatval(Cart::subtotal())* 1000) }}</strong></li>
                            @if (getPrice(Cart::subtotal()) >= 59.99)
                            <li class="d-flex justify-content-between py-3"><strong class="text-muted">Livraison</strong><strong> 4.99 € </strong></li>
                            <li style="color: green" class="d-flex justify-content-between py-3 border-bottom"><strong>livraison gratuite</strong><strong>- 4.99 € </strong></li>

                            @else
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Livraison</strong><strong> 4.99 € </strong></li>

                            @endif

                            <!-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li> -->
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                @if (getPrice(Cart::subtotal()) >= 59.99)
                                <h5 class="font-weight-bold">{{ getPrice(Cart::total())  }}</h5>

                                @else
                                <h5 class="font-weight-bold">{{ getPrice(floatval(Cart::total())* 1000 + 499) }}</h5>

                                @endif
                            </li>
                        </ul><a href="{{ route('cart.index') }}" class="btn btn-dark rounded-pill py-2 btn-block"><i class="fa fa-credit-card" aria-hidden="true"></i> Payer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div style="padding-top:100px" class="container">
    <div class="row col-md-6">
        <h5>Votre panier est vide pour le moment.</h5>
        <p>Mais vous pouvez visiter la <a href="{{ route('shop') }}">boutique</a> pour faire votre shopping.
        </p>
    </div>

</div>
@endif

@endif


@endsection

@section('script-extra')
<script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function() {
            var rowId = element.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/panier/${rowId}`, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'PATCH',
                body: JSON.stringify({
                    qty: this.value
                })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
</script>
@endsection