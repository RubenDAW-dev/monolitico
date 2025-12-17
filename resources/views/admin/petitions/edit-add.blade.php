@extends('layouts.admin')

@section('title', isset($petition) ? 'Editar Petición' : 'Nueva Petición')

@section('content')
    <h2>{{ isset($petition) ? 'Editar Petición' : 'Crear Petición' }}</h2>

    <form action="{{ isset($petition) ? route('adminpeticiones.update', $petition->id) : route('adminpeticiones.store') }}" method="POST">
        @csrf
        @if(isset($petition))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $petition->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $petition->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="recipient" class="form-label">Destinatario</label>
            <input type="text" name="recipient" id="recipient" class="form-control" value="{{ old('recipient', $petition->recipient ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="signers" class="form-label">Firmantes</label>
            <input type="number" name="signers" id="signers" class="form-control"
                   value="{{ old('signers', $petition->signers ?? 0) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Selecciona categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            {{ (isset($petition) && $petition->category_id == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select">
                <option value="pending" {{ (isset($petition) && $petition->status === 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ (isset($petition) && $petition->status === 'accepted') ? 'selected' : '' }}>Accepted</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($petition) ? 'Guardar cambios' : 'Crear petición' }}
        </button>
        <a href="{{ route('adminpeticiones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
