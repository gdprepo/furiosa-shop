@extends('./../layouts/dashboard')

@section('content')

<div class=" container">

    <div class="col-xs4">
        <h1>List des Categories
        </h1>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Slug</th>
                <th style="text-align: unset;" scope="col">
   
                    <a href="{{ route('category.new') }}">
                        <button style="margin: 0; margin-right: -20%; width: 100%" type="button" class="btn btn-primary">Add</button>
                    </a>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)

            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>

                    <a href="{{ route('category.show', $category->id) }}">
                        <button style="width: 100%;" type="button" class="btn btn-success">Edit</button>
                    </a>
                    <form method="POST" action="{{ route('category.delete', $category->id) }}">
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