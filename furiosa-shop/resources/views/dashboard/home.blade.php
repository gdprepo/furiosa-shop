@extends('./../layouts/dashboard')

@section('content')

<div class=" container">

    <div class="col-xs4">
        <h1>Modifier la page HOME
        </h1>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th style="text-align: unset;" scope="col"><button style="margin: 0; margin-right: -20%" type="button" class="btn btn-primary">Add</button></th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $slider->title }}</td>
                <td style="width: 26%;"> <img style="width: 100%" class="img-fluid" src="{{ asset('uploads/images/' .$slider->image ) }}" alt="First slide">
                </td>
                <td>{{ substr($slider->description, 0, 30) . '...' }}</td>
                <td>
                    <a href="{{ url('/admin/slider/show/'.$slider->id) }}">
                        <button type="button" class="btn btn-success">Edit</button>
                    </a>
                </td>

            </tr>
        </tbody>
    </table>

</div>


@endsection