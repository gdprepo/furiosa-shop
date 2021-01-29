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

    <form method="POST" action="{{ route('product.add') }}" enctype="multipart/form-data">
        @csrf


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre: </span>
            </div>
            <input name="title" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description: </span>
            </div>
            <textarea name="description" type="text" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"></textarea>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Prix: </span>
            </div>
            <input name="price" type="text" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Image</span>
            </div>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Images</span>
            </div>
            <div class="custom-file">
                <input multiple="multiple" name="images[]" type="file" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>
        </div>

        <div class="col-xs3form-group">
            <label>Category : </label>

            <div class="multi-box">
                <select id="myselect" style="margin-top: 10px" name="categories[]" class="w-100 select2" multiple="multiple" data-placeholder="Select Categories" style="width: 100%;">
                    @foreach($categories as $category)
                    <option>{{ $category->name }}</option>
                    @endforeach
                </select>

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