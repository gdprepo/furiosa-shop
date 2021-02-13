@extends('layouts.app')

@section('extra-meta')

<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>



@endsection



@section('content')

<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

?>

<?php if (Auth::check()) { ?>

<?php } else { ?>
@if ($iPhone || $iPad || $iPad || $Android)
<div class="" style="width: 100%;">
    <div
        style="margin-left: 10%; margin-top: 30px; margin-bottom: 150px; background: #d8d8d8; width: 80%; text-align: center; padding: 10px; border-radius: 15px">
        <h3 class="login-content-title">DÉJÀ <span>MEMBRE ?</span></h3>
        <a href="{{ route('login') }}">Me connecter</a>
    </div>
</div>
@else
<div class="" style="width: 100%; padding-top: 150px; margin-bottom: 100px">
    <div
        style="margin-left: 10%; margin-top: -30px; background: #d8d8d8; width: 80%; text-align: center; padding: 10px; border-radius: 15px">
        <h3 class="login-content-title">DÉJÀ <span>MEMBRE ?</span></h3>
        <a href="{{ route('login') }}">Me connecter</a>
    </div>
</div>
@endif


<?php } ?>


@if ($iPhone || $iPad || $iPad || $Android)
<div style="margin-top: -115px; margin-bottom: 100px" class="col-md-12">

@else
<div style="margin-top: -70px; margin-bottom: 100px" class="container">

@endif




    <div class="row">
        <div style="margin-top: -20px;" class="col-md-8 mx-auto">

            <?php if (Auth::check()) {
                echo "
                    <h4 class='text-center card-header'>COMMANDER EN TANT QUE " . Auth::user()->name . "  </h4>
                
                
                
                ";
            } else {
            }


            ?>


            <div class="my-4 card">

                <div style="margin-bottom: 50px; margin-top: -20px" id="payer">


                    <form action="{{ url('charge') }}" method="post">
                        <input type="text" style="display:none" name="email" id="commandeEmail" value="">
                        <input type="text" style="display:none" name="nom" id="paypalNom" value="">
                        <input type="hidden" name="prenom" id="paypalPrenom" value="">
                        <input type="text" style="display:none" name="adresse" id="paypalAdresse" value="">
                        <input type="hidden" name="adresse2" id="paypalAdresse2" value="">
                        <input type="hidden" name="ville" id="paypalVille" value="">
                        <input type="hidden" name="codepostal" id="paypalCpl" value="">
                        <input type="hidden" name="pays" id="paypalPays" value="">


                        <?php

   
                        if (getPrice(Cart::subtotal()) >= 59.99) {
                            $total = getPrice(floatval(Cart::total())* 1000);
                        } else {
                            $total = getPrice(floatval(Cart::total())* 1000 + 499);
                        }
                        ?>
                        <input value="{{ $total }}" type="hidden" type="text" name="amount" />
                        {{ csrf_field() }}
                        <!-- <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" name="submit" value="Pay Now"> -->

                        @if ($iPhone || $iPad || $iPad || $Android)
                        <button type="submit" name="submit"
                            style="margin-top: 40px; width: 80%; padding: 5px; margin-left: 10%; height: 50px"
                            class="btn btn-warning"><img style="width: 30%; margin-top: -22px"
                                src="{{ asset('/images/paypal.png') }}" alt=""></button>

                        @else
                        <button type="submit" name="submit"
                            style="margin-top:50px; width: 80%; padding: 10px 50px; margin-left: 10%; height: 55px"
                            class="btn btn-warning"><img style="width: 30%; margin-top: -57px"
                                src="{{ asset('/images/paypal.png') }}" alt=""></button>

                        @endif

                    </form>

                    <p style="font-weight: bold; text-align: center; margin-top: 20px; margin-bottom: -50px">OU</p>


                    <form style="margin: 20px; padding: 20px;" action="{{ url('paiementCheckout') }}" method="post"
                        class="my-4" id="payment-form">
                        @csrf
                        <div style="width: 100%;" class="container">



                            @if (Auth::check())

                            @else
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    placeholder="you@example.com" required>
                                <div class="invalid-feedback">
                                    Entrer une email valide.
                                </div>
                            </div>
                            <!-- <div style="margin-top: 20px" class="form">
                                <input type="text" autocomplete="off" id="email" name="email" value="" required>
                                <label for="email" class="label-input">
                                    <span class="content-input">Email</span>
                                </label>

                            </div>-->
                            @endif
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nom</label>
                                    <input name="nom" type="text" class="form-control" id="nom" placeholder="" value=""
                                        required="">
                                    <div class="invalid-feedback">
                                        Entrer un Nom valide.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Prenom</label>
                                    <input name="nom" type="text" class="form-control" id="prenom" placeholder=""
                                        value="" required="">
                                    <div class="invalid-feedback">
                                        Entrer un Prenom valide.
                                    </div>
                                </div>
                            </div>

                            <!--
                             <div class="row" style="margin-bottom: -10px">
                                <div style="margin-top: 5px; margin: 15px" class="form col-md-4">
                                    <input type="text" autocomplete="off" id="nom" name="nom" value="" required>

                                    <label for="nom" class="label-input">
                                        <span class="content-input">Nom</span>
                                    </label>

                                </div>

                                <div style="margin-top: 5px; margin: 15px;" class="form col-md-4">
                                    <input type="text" autocomplete="off" id="prenom" name="prenom" value="" required>

                                    <label for="prenom" class="label-input">
                                        <span class="content-input">Prenom</span>
                                    </label>

                                </div>
                            </div> -->

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input name="adresse" type="text" class="form-control" id="address"
                                    placeholder="1234 Main St" required="">
                                <div class="invalid-feedback">
                                    Entrer un adresse valide.
                                </div>
                            </div>
                            <!--
                            <div style="margin-top: 5px;" class="form ">
                                <input type="text" autocomplete="off" id="adresse" name="adresse" value="" required>

                                <label for="adresse" class="label-input">
                                    <span class="content-input">Adresse</span>
                                </label>

                            </div>
                            -->

                            <div class="mb-3">
                                <label for="address">Ville</label>
                                <input name="ville" type="text" class="form-control" id="ville" placeholder="Paris"
                                    required="">
                                <div class="invalid-feedback">
                                    Entrer un adresse valide.
                                </div>
                            </div>
                            <!--
                            <div style="margin-top: 5px;" class="form ">
                                <input type="text" autocomplete="off" id="ville" name="ville" value="" required>


                                <label for="ville" class="label-input">
                                    <span class="content-input">Ville</span>
                                </label>

                            </div> -->

                        </div>


                        <div style="margin-top: 20px; margin-left: 0%" class="row">


                            <div class="col-md-6" class="form-group">
                                <label for="pays">Pays</label>
                                <!-- <input type="text" class="form-control" id="pays" name="pays" value="" required> -->
                                <select name="pays" id="pays" class="form-control" required>
                                    <option value="FR">France</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Greece">Greece</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IT">Italy</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MT">Malta</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="RO">Romania</option>
                                    <option value="SM">San Marino</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="ES">Spain</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="DK">Denmark</option>
                                    <option value="EE">Estonia</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FI">Finland</option>
                                    <option value="GL">Greenland</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IE">Ireland</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="NO">Norway</option>
                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="TR">Turkey</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                @if ($iPhone || $iPad || $iPad || $Android)
                                <label style="margin-top: 20px" for="codepostal">Code Postal</label>
                                @else
                                <label for="codepostal">Code Postal</label>
                                @endif

                                <input type="number" class="form-control " id="codepostal" name="codepostal" value=""
                                    required>

                            </div>
                        </div>

                        <div id="card-element" style="margin-top: 20px; margin-bottom: 30px">

                        </div>

                        <!-- We'll put the error messages in this element -->
                        <div id="card-errors" role="alert"></div>



                        <button class="btn btn-success btn-block mt-3" id="submit">
                            @if (getPrice(Cart::subtotal()) >= 59.99)
                            <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{
                            getPrice(Cart::total()) }})

                            @else
                            <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{
                                getPrice(floatval(Cart::total())* 1000 + 499) }})
                            @endif
                        </button>

                    </form>

                </div>





            </div>


        </div>
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Votre Commande</span>
                <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach (Cart::content() as $product)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $product->model->title }}
                            @if ($product->options != "[]" && $product->options != "[null]")
                            - {{ $product->options }}
                            @endif</h6>
                        <small class="text-muted">{{ substr( $product->description, 0, 10) }}</small>
                    </div>
                    <span class="text-muted">{{ getPrice(floatval($product->subtotal()) * 1000) }}</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Livraison</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">{{ getPrice(floatval(499)) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Total</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">{{ getPrice(floatval(Cart::total()) * 1000 + 499) }}</span>
                </li>



        </div>

    </div>
</div>

</div>
@endsection

@section('script-extra')

<script>
    var stripe = Stripe('pk_test_51IJhpWAFIgadoHQ3SZqYGLVbXONuwWtusUGOEemr3HelIDej8X8pAs5AAR8asqMFHkb4ukhNvqAtY2HiKWUvX5Ni00xBZjFS4s');

    var elements = stripe.elements();

    var style = {
        base: {
            color: "#32325d",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };

    var card = elements.create("card", {
        hidePostalCode: true,
        style: style
    });
    card.mount("#card-element");

    card.on('change', ({
        error
    }) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning');
            displayError.textContent = '';
        }
    });

    // var options = {
    //     name: document.getElementById('name').value,
    //     prenom: document.getElementById('prenom').value,
    //     adresse: document.getElementById('adresse').value,
    //     ville: document.getElementById('ville').value,
    //     codepostal: document.getElementById('codepostal').value,
    //     pays: document.getElementById('pays').value,
    //     email: document.getElementById('email').value,
    // }

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function (ev) {
        ev.preventDefault();
        form.disabled = true;


        // stripe.createToken(
        //     card
        // ).then(function(token) {
        // // Send token to server
        // });

        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card,
            }
        }).then(function (result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                form.disabled = false;
                console.log(result.error.message);
            } else {
                console.log('coucou');
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                console.log('coucou2');

                    var paymentIntent = result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    var url = form.action;
                    var redirect = '/site/public/merci';

                    fetch(
                        url, {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'POST',
                        body: JSON.stringify({
                            paymentIntent: paymentIntent,
                            adresse: document.getElementById('address').value,
                            nom: document.getElementById('nom').value,
                            prenom: document.getElementById('prenom').value,
                            ville: document.getElementById('ville').value,
                            codepostal: document.getElementById('codepostal').value,
                            pays: document.getElementById('pays').value,
                            email: document.getElementById('email').value,
                        })
                    }).then((data) => {
                        console.log(data)
                        window.location.href = redirect;
                    }).catch((error) => {
                        console.log(error)
                    })
                }
            }
        });

    });





</script>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    // var nom = $('#nom').val();
    // var prenom = $('#prenom').val();
    // var adresse = $('#adresse').val();
    // var ville = $('#ville').val();
    // var codepostal = $('#codepostal').val();
    // var pays = $('#pays').val();
    // var redirect = '/merci'; 
</script>
@endsection