@extends('./../layouts/dashboard')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<style>
    .multi-box select {
        width: 100%
    }

    .multi-box button {
        background-color: darkblue !important;
        color: #fff !important;
        padding: 15px 25px;
    }
</style>

<div style="margin-bottom: 150px;" class="grix xs2 container">

    <div class="col-xs4">
        <h1>Creer un Produit
        </h1>
    </div>

    <form method="POST" action="{{ route('category.add') }}" enctype="multipart/form-data">
        @csrf


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre : </span>
            </div>
            <input name="name" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Slug : </span>
            </div>
            <input name="slug" type="text" class="form-control" placeholder="Slug" aria-label="Slug" aria-describedby="basic-addon1" required>
        </div>


        <button style="width: 100%" type="submit" class="btn btn-primary">Enregistrer</button>
    </form>





</div>


@endsection


@section('js-extra')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').chosen();
    })
</script>


@endsection