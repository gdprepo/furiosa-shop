@extends('layouts.app')

@section('content')
    <div style="padding-top: 100px" class="container">
        <div class="jumbotron text-center">
            <h1 class="display-3">Merci !</h1>
            <p class="lead"><strong>Votre commande a été traitée avec succès</strong> Vous allez recevoir un mail de confirmation</p>
            <hr>
            <p>
                Vous rencontrez un problème? <a href="mailto:md.website98@gmail.com">Nous contacter</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('shop') }}" role="button">Continuer vers la boutique</a>
            </p>
        </div>
    </div>
@endsection