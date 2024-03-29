@extends('./../layouts/dashboard')

@section('content')

<div class="grix xs2 container">

    <div class="col-xs4">
        <h1>Ajouter un SLIDER pour la page Home
        </h1>
    </div>

    <form method="POST" action="{{ route('slider.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Image</span>
            </div>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div class="col-xs3">
            <img style="width: 100%" class="d-block" src="https://via.placeholder.com/1200x600'" alt="First slide">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre:</span>
            </div>
            <input name="title" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description:</span>
            </div>
            <input name="description" type="text" class="form-control" placeholder="Description" aria-label="Titre" aria-describedby="basic-addon1">
        </div>


        <button style="width: 100%" type="submit" class="btn btn-primary">Enregistrer</button>
    </form>





</div>


@endsection