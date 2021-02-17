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
                <th style="text-align: unset;" scope="col">
                    <a href="{{ route('slider.new') }}">
                        <button style="margin: 0; margin-right: -20%" type="button" class="btn btn-primary">Add</button>
                    </a>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)

            <tr>
                <th scope="row">{{ $slider->id }}</th>
                <td>{{ $slider->title }}</td>
                <td style="width: 26%;"> <img style="width: 100%" class="img-fluid" src="{{ $slider->image != 'https://via.placeholder.com/1200x600' ? asset('uploads/images/' .$slider->image ) : 'https://via.placeholder.com/1200x600' }}" alt="First slide">
                </td>
                <td>{{ substr($slider->description, 0, 30) . '...' }}</td>
                <td>
                    <a href="{{ route('slider.show', $slider->id) }}">
                        <button style="width: 100%;" type="button" class="btn btn-success">Edit</button>
                    </a>
                    <form method="POST" action="{{ route('slider.delete', $slider->id) }}">
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