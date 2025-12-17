@extends('layouts.admin')

@section('title', isset($category) ? 'Editar Categoría' : 'Nueva Categoría')

@section('content')
    <h2>{{ isset($category) ? 'Editar Categoría' : 'Crear Categoría' }}</h2>

    <form action="{{ isset($category) ? route('admincategorias.update', $category->id) : route('admincategorias.store') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoría</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $category->name ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($category) ? 'Guardar cambios' : 'Crear categoría' }}
        </button>
        <a href="{{ route('admincategorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

