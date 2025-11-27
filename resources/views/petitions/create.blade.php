@extends('layouts.public')

@section('title', 'Create Petition')

@section('content')
<div class="container">
    <h2 class="h2CrearPetition mt-3">Demos el primer paso hacia el cambio</h2>

    <form action="{{ route('petitions.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
        @csrf
        <div class="mb-4">
            <label for="title" class="form-label fw-semibold">Título de la petición</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label fw-semibold">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="form-label fw-semibold">Categoría</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
