@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
    <h2>Listado de Usuarios</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('adminusuarios.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Nuevo Usuario
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role ?? 'Usuario' }}</td>
                <td>
                    <a href="{{ route('adminusuarios.show', $user->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('adminusuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('adminusuarios.delete', $user->id) }}"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

