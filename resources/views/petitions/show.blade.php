@extends('layouts.public')

@section('title', 'Ver Petición')

@section('content')
    <div class="container my-5">
        <h1 class="tituloPeticion">{{ $petition->title }}</h1>

        {{-- Mostrar imágenes asociadas --}}
        @if($petition->files->count())
            @foreach($petition->files as $file)
                <img src="{{ asset('storage/'.$file->file_path) }}"
                     alt="{{ $file->name }}"
                     class="img-fluid rounded mb-4">
            @endforeach
        @else
            <p class="text-muted">Esta petición no tiene imágenes asociadas.</p>
        @endif

        <p class="textoPeticion">{{ $petition->description }}</p>

        <div class="mb-3">
            <small class="text-secondary">
                Categoría: {{ $petition->category->name ?? 'Sin categoría' }} <br>
                Autor: {{ $petition->user->name ?? 'Anónimo' }}
            </small>
        </div>

        <div class="sticky-sidebar card shadow-sm p-4">
            <h4>Firma esta petición</h4>
            <form action="{{ route('petitions.sign', $petition->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Firmar</button>
            </form>
            <div class="mt-4">
                <p><strong>{{ $petition->signers }}</strong> personas ya han firmado</p>
            </div>

            {{-- Botón de editar solo si el usuario es el creador --}}
            @if(auth()->check() && auth()->id() === $petition->user_id)
                <div class="mt-3">
                    <a href="{{ route('petitions.edit', $petition->id) }}" class="btn btn-warning w-100">
                        Editar petición
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
