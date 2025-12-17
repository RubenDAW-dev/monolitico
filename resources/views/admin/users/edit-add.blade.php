@extends('layouts.admin')

@section('title', 'Editar Usuario')

@section('content')
    <h2>Editar Usuario</h2>

    <form action="{{ route('adminusuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-select">
                <option value=0 {{ $user->role == 0 ? 'selected' : '' }}>Usuario</option>
                <option value=1 {{ $user->role == 1 ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('adminusuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

