@extends('./../layouts/dashboard')

@section('content')

<div class="grix xs2 container">

    <div class="col-xs4">
        <h1>Profil de
            {{ Auth::user()->name }}
        </h1>
    </div>


    <div class="col-xs1">Nom :</div>
    <div class="col-xs3">{{ $user->name }}</div>
    <div class="col-xs1">Email :</div>
    <div class="col-xs3">{{ $user->email }}</div>
</div>

<div style="margin: 30px" class="col-xs4 container mt-5 pt-5">
    <a href="{{ route('dashboard.home') }}" class="btn shadow-1 rounded-1 blue">Modifier la page d'accueil</a>
    <a href="{{ route('dashboard.home') }}" class="btn shadow-1 rounded-1 blue">Modifier le profil</a>

    <a href="" class="btn shadow-1 rounded-1 blue">Modifier le mot de passe</a>
</div>


@endsection