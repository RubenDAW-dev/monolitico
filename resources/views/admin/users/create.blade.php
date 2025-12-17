@extends('layouts.admin')

@section('title', 'Nuevo Usuario')

@section('content')
    <h2>Crear Usuario</h2>

    <form action="{{ route('adminusuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-select" required>
                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('role') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear usuario</button>
        <a href="{{ route('adminusuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
