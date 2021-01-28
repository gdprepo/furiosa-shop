@extends('./../layouts/dashboard')

@section('content')

<div class="grix xs2 container">

    <div class="col-xs4">
        <h1>Modifier le Produit {{ $product->id }} - {{ $product->title }}
        </h1>
    </div>

    <form method="POST" action="{{ url('/admin/product/update/' .$product->id) }}" enctype="multipart/form-data">
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
            <img style="width: 100%" class="d-block" src="{{ $product->image != 'https://via.placeholder.com/450x450' ? asset('uploads/images/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt="First slide">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre: {{ $product->title }}</span>
            </div>
            <input value="{{ $product->title }}" name="title" type="text" class="form-control" placeholder="Titre" aria-label="Titre" aria-describedby="basic-addon1">
        </div>
        <div class="col-xs3form-group">
            <label>Category : 
            <?php  $name = ""; ?>
            @foreach($product->categories as $category)
            <?php if ($category->name != $name) {  $name = $category->name; ?>
            {{ $category->name }}
            <?php } ?>
            @endforeach
            
    
            </label>
            <select style="margin-top: 10px" name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Select Categories" style="width: 100%;">
                @foreach($categories as $category)
                <option>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <button style="width: 100%" type="submit" class="btn btn-primary">Enregistrer</button>
    </form>





</div>


@endsection