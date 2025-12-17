@extends('layouts.public')

@section('title', 'Mis Peticiones')

@section('content')
    <div class="container mt-4">
        <h2>Mis Peticiones</h2>

        @if($petitions->count())
            <ul class="list-group">
                @foreach($petitions as $petition)
                    <li class="list-group-item">
                        <h5>{{ $petition->title }}</h5>
                        <p>{{ Str::limit($petition->description, 100) }}</p>
                        <a href="{{ route('petitions.show', $petition->id) }}" class="btn btn-sm btn-primary">
                            Ver
                        </a>
                        <a href="{{ route('petitions.edit', $petition->id) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="mt-3">
                {{ $petitions->links() }}
            </div>
        @else
            <p>No has creado ninguna petición todavía.</p>
        @endif
    </div>
@endsection
