@extends('./../layouts/dashboard')

@section('content')

<div class="grix xs2 container">

    <div class="col-xs4">
        <h1>Modifier le SLIDER
        </h1>
    </div>

    <form method="POST" action="{{ url('/admin/slider/update/' .$slider->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Image</span>
            </div>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
                <label  class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div class="col-xs3">
            <img style="width: 100%" class="d-block" src="{{ asset('uploads/images/' .$slider->image ) }}" alt="First slide">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre: {{ $slider->title }}</span>
            </div>
            <input name="title" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1">
        </div>


        <button style="width: 100%" type="submit" class="btn btn-primary">Enregistrer</button>
    </form>





</div>


@endsection