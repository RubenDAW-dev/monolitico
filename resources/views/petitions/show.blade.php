@extends('layouts.public')

@section('title', 'Sign Petition')

@section('content')
<div class="container my-5">
    <h1 class="tituloPeticion">{{ $petition->title }}</h1>
    <img src="{{ asset('src/señora.png') }}" alt="Imagen de la petición" class="img-fluid rounded mb-4">
    <p class="textoPeticion">{{ $petition->description }}</p>

    <div class="sticky-sidebar card shadow-sm p-4">
        <h4>Firma esta petición</h4>
        <form action="{{ route('petitions.sign', $petition->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Firmar</button>
        </form>
        <div class="mt-4">
            <p><strong>{{ $petition->signers }}</strong> personas ya han firmado</p>
        </div>
    </div>
</div>
@endsection
