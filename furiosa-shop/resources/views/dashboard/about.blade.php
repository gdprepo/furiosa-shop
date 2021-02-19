@extends('./../layouts/dashboard')

@section('content')

<div class=" container">

    <div class="col-xs4">
        <h1>Modifier la page About
        </h1>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Image</th>
                <th scope="col">Profil</th>
                <th scope="col">Description</th>
                <th style="text-align: unset;" scope="col">

                </th>

            </tr>
        </thead>
        <tbody>


            <tr>
                <td>{{ $about->title }}</td>
                <td style="width: 26%;"> <img style="width: 100%" class="img-fluid" src="{{ $about->image != 'https://via.placeholder.com/900x300' ? asset('uploads/images/' .$about->image ) : 'https://via.placeholder.com/900x300' }}" alt="First slide">
                </td>
                <td style="width: 26%;"> <img style="width: 100%" class="img-fluid" src="{{ $about->img_profile != 'https://via.placeholder.com/500x500' ? asset('uploads/images/' .$about->img_profile ) : 'https://via.placeholder.com/500x500' }}" alt="First slide">
                </td>
                <td>{{ substr($about->description, 0, 30) . '...' }}</td>
                <td>
                    <a href="{{ route('about.show', $about->id) }}">
                        <button style="width: 100%;" type="button" class="btn btn-success">Edit</button>
                    </a>

                </td>

            </tr>

        </tbody>
    </table>

</div>


@endsection