@extends('./../layouts/dashboard')

@section('content')

<div class="grix xs2 container">

    <div class="col-xs4">
        <h1>Modifier la page About
        </h1>
    </div>

    <form method="POST" action="{{ url('/admin/about/update/' .$about->id) }}" enctype="multipart/form-data">
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
            <img style="width: 100%" class="d-block" src="{{ $about->image != 'https://via.placeholder.com/900x300' ? asset('uploads/images/' .$about->image ) : 'https://via.placeholder.com/900x300' }}" alt="First slide">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Profil</span>
            </div>
            <div class="custom-file">
                <input name="img_profile" type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div class="col-xs3">
            <img style="width: 100%" class="d-block" src="{{ $about->img_profile != 'https://via.placeholder.com/500x500' ? asset('uploads/images/' .$about->img_profile ) : 'https://via.placeholder.com/1200x600' }}" alt="First slide">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre: {{ $about->title }}</span>
            </div>
            <input value="{{ $about->title }}" name="title" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Text : {{ $about->text }}</span>
            </div>
            <input value="{{ $about->text }}" name="text" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre: {{ $about->description }}</span>
            </div>
            <textarea value="{{ $about->description }}" name="description" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1"></textarea>
        </div>


        <button style="width: 100%" type="submit" class="btn btn-primary">Enregistrer</button>
    </form>





</div>


@endsection