@extends('layouts.public')

@section('title', 'List of Petitions')

@section('content')
    <div class="container">
        <h2 class="tituloListPetitions">Descubre tu próxima causa</h2>
        <p class="parrafoListPetitions">Explora millones de peticiones y encuentra las que te interesan</p>

        <div class="row">
            @foreach($petitions as $petition)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 mt-4">
                        @if($petition->files->count())
                            <img class="card-img-top" src="{{ asset('storage/'.$petition->files->first()->file_path) }}" alt="{{ $petition->title }}">
                        @else
                            <img class="card-img-top" src="{{ asset('src/default.jpg') }}" alt="Sin imagen">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $petition->title }}</h5>
                            <p class="card-text">{{ Str::limit($petition->description, 100) }}</p>
                            <a href="{{ route('petitions.show', $petition->id) }}" class="btn btn-outline-primary mt-auto">
                                🖌️ {{ $petition->signers }} Firmas
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
