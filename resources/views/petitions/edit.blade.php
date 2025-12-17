@extends('layouts.public')

@section('title', 'Editar Petición')

@section('content')
    <div class="container">
        <h2 class="mt-3">Editar Petición</h2>

        <form action="{{ route('petitions.update', $petition->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="form-label fw-semibold">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $petition->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description', $petition->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="recipient" class="form-label fw-semibold">Destinatario</label>
                <input type="text" class="form-control" id="recipient" name="recipient" value="{{ old('recipient', $petition->recipient) }}" required>
            </div>

            <div class="mb-4">
                <label for="category_id" class="form-label fw-semibold">Categoría</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $petition->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label fw-semibold">Imagen (opcional)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
