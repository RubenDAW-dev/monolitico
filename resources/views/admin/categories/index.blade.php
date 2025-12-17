@extends('layouts.admin')

@section('title', 'Gestión de Categorías')

@section('content')
    <h2>Listado de Categorías</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admincategorias.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Categoría
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admincategorias.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('admincategorias.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admincategorias.delete', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoria?');">
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
