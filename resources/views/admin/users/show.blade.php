@extends('layouts.admin')

@section('title', 'Detalle de Usuario')

@section('content')
    <h2>Detalle del Usuario</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ $user->role ?? 'Usuario' }}</p>
            <p><strong>Creado:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('adminusuarios.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
