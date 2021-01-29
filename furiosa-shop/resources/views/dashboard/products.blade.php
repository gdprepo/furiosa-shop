@extends('./../layouts/dashboard')

@section('content')

<div class=" container">

    <div class="col-xs4">
        <h1>List des Produits
        </h1>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Categories</th>
                <th style="text-align: unset;" scope="col">
                    <a href="{{ route('product.new') }}">
                        <button style="margin: 0; margin-right: -20%" type="button" class="btn btn-primary">Add</button>
                    </a>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <td>{{ $product->title }}</td>
                <td style="width: 26%;"> <img style="width: 100%" class="img-fluid" src="{{ $product->image != 'https://via.placeholder.com/450x450' ? asset('uploads/products/' .$product->image ) : 'https://via.placeholder.com/450x450' }}" alt="First slide">
                </td>
                <td>{{ substr($product->description, 0, 30) . '...' }}</td>
                <td>
                    @foreach($product->categories as $category)
                    {{ $category->name }}<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('produit.show', $product->id) }}">
                        <button style="width: 100%;" type="button" class="btn btn-success">Edit</button>
                    </a>
                    <form method="POST" action="{{ route('product.delete', $product->id) }}">
                    @csrf
                        <button style="width: 100%;" type="submit" class="btn btn-success">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection