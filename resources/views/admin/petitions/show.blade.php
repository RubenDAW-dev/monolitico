@extends('layouts.admin')

@section('title', 'Detalle de Petición')

@section('content')
    <h2>Detalle de la Petición</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4>{{ $petition->title }}</h4>
            <p><strong>Descripción:</strong> {{ $petition->description }}</p>
            <p><strong>Firmantes:</strong> {{ $petition->signers }}</p>
            <p><strong>Estado:</strong> {{ $petition->status }}</p>
        </div>
    </div>

    <a href="{{ route('adminpeticiones.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection

