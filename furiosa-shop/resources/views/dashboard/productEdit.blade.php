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

<div style="margin-bottom: 150px;" class="grix container">

    <div class="col-xs4">
        <h1>Modifier le Produit {{ $product->id }} - {{ $product->title }}
        </h1>
    </div>

    <form method="POST" action="{{ url('/admin/product/update/' .$product->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="grix xs2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Titre:</span>
                </div>
                <input value="{{ $product->title }}" name="title" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Slug:</span>
                </div>
                <input value="{{ $product->slug }}" name="slug" type="text" class="form-control" aria-label="Slug" aria-describedby="basic-addon1">
            </div>  

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Description:</span>
                </div>
                <textarea value="{{ $product->description }}" name="description" type="text" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"></textarea>
            </div>

          


        </div>

        <div class="grix xs4">
            <div class="input-group mb-3">

                <div class="form-file">
                    <label for="img" class="btn primary rounded-1 shadow-1">Image</label>
                    <input type="file" name="image" id="img" multiple accept="image/png, image/jpeg" />
                    <div class="form-file-path"></div>
                </div>

            </div>
            <div class="col-xs3">
                <img style="width: 50%; margin-left: 20%" class="d-block" src="{{ $product->image != 'https://via.placeholder.com/450x450' ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt="First slide">
            </div>


            <div class="input-group mb-3">
                <div class="form-file">
                    <label for="img2" class="btn primary rounded-1 shadow-1">Images</label>
                    <input type="file" name="images[]" id="img2" multiple="mutiple" accept="image/png, image/jpeg" />
                    <div class="form-file-path"></div>
                </div>

            </div>
            <div style="display: flex; float:right; margin-left: 20%" class="col-xs3">
                @foreach($product->images as $image)
                <img style="width: 150px; height: 150px; padding: 10px" class="d-block" src="{{ file_exists(public_path('uploads/products/' .$image->name)) ? asset('uploads/products/' .$image->name ) : 'https://via.placeholder.com/450x450' }}" alt="First slide">
                @endforeach
            </div>

        </div>



        <div style="margin-top: 30px; margin-bottom: 20px" class="col-xs3form-group">
            <label>Taille disponibles :


                {{ $product->taille }}




            </label>

            <div style="margin-top: 10px; margin-bottom: 20px" class="multi-box">
                <select id="myselect" style="margin-top: 10px" name="taille[]" class="w-100 select2" multiple="multiple" data-placeholder="Select Size" style="width: 100%;">
                    <option>Petit</option>
                    <option>Moyen</option>
                    <option>Grand</option>
                </select>

            </div>
            <label>Category :
                <?php $name = ""; ?>
                @foreach($product->categories as $category)
                <?php if ($category->name != $name) {
                    $name = $category->name; ?>
                    {{ $category->name }}
                <?php } ?>
                @endforeach


            </label>

            <div style="margin-top: 10px;" class="multi-box">
                <select id="myselect" style="margin-top: 10px" name="categories[]" class="w-100 select2" multiple="multiple" data-placeholder="Select Categories" style="width: 100%;">
                    @foreach($categories as $category)
                    <option>{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>

            <div style="margin-top: 20px;" class="form-field">
                <label class="form-check">
                    <input name="home" type="checkbox" value="true" />
                    <span>Afficher sur la page principale</span>
                </label>
            </div>

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