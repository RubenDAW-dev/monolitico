@extends('layouts.public')

@section('title', 'List of Petitions')

@section('content')
<div class="container">
    <h2 class="tituloListPetitions">Descubre tu próxima causa</h2>
    <p class="parrafoListPetitions">Explora millones de peticiones y encuentra las que te interesan</p>

    <!-- Aquí puedes iterar las peticiones desde el controlador -->
    <ul>
        @foreach($petitions as $petition)
            <li>
                <a href="{{ route('petitions.show', $petition->id) }}">
                    {{ $petition->title }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $petitions->links() }}
</div>
@endsection
