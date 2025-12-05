@extends('layouts.admin')

@section('title', 'Gestión de Peticiones')

@section('content')
    <h2>Listado de Peticiones</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Firmantes</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($petitions as $petition)
            <tr>
                <td>{{ $petition->id }}</td>
                <td>{{ $petition->title }}</td>
                <td>{{ Str::limit($petition->description, 50) }}</td>
                <td>{{ $petition->signers }}</td>
                <td>{{ $petition->status }}</td>
                <td>
                    <a href="{{ route('adminpeticiones.show', $petition->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('adminpeticiones.edit', $petition->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('adminpeticiones.delete', $petition->id) }}" method="POST" style="display:inline;">
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
-
