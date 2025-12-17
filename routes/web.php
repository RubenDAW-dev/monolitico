<?php

use App\Http\Controllers\Admin\AdminCategoriasController;
use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;


Route::get('/', [PagesController::class, 'home'])->name('home');


Route::get('/petitions', [PetitionController::class, 'index'])->name('petitions.index');
Route::get('/petitions/all', [PetitionController::class, 'all'])->name('petitions.all');
Route::get('/petitions/create', [PetitionController::class, 'create'])->name('petitions.create');
Route::post('/petitions', [PetitionController::class, 'store'])->name('petitions.store');
Route::get('/petitions/mine', [PetitionController::class, 'mine'])->name('petitions.mine')->middleware('auth');
Route::get('/petitions/{id}', [PetitionController::class, 'show'])->name('petitions.show');
Route::get('/petitions/{id}/edit', [PetitionController::class, 'edit'])->name('petitions.edit');
Route::put('/petitions/{id}', [PetitionController::class, 'update'])->name('petitions.update');
Route::delete('/petitions/{id}', [PetitionController::class, 'destroy'])->name('petitions.destroy');

Route::post('/petitions/{id}/sign', [PetitionController::class, 'sign'])
    ->middleware('auth')
    ->name('petitions.sign');


Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Peticiones
Route::middleware(Admin::class)
    ->controller(\App\Http\Controllers\Admin\AdminPetitionsController::class)
    ->group(function () {
        Route::get('admin', 'index')->name('admin.home');
Route::get('admin/peticiones/index', 'index')->name('adminpeticiones.index');
Route::get('admin/peticiones/{id}', 'show')->name('adminpeticiones.show');
Route::get('admin/peticion/add', 'create')->name('adminpeticiones.create');
Route::get('admin/peticiones/edit/{id}', 'edit')->name('adminpeticiones.edit');
Route::post('admin/peticiones', 'store')->name('adminpeticiones.store');
Route::delete('admin/peticiones/{id}', 'delete')->name('adminpeticiones.delete');
Route::put('admin/peticiones/{id}', 'update')->name('adminpeticiones.update');
Route::put('admin/peticiones/estado/{id}', 'cambiarEstado')->name('adminpeticiones.estado');
    });

// Categorías
Route::prefix('admin/categorias')->group(function () {
    Route::get('/', [AdminCategoriasController::class, 'index'])->name('admincategorias.index');
    Route::get('/create', [AdminCategoriasController::class, 'create'])->name('admincategorias.create');
    Route::post('/', [AdminCategoriasController::class, 'store'])->name('admincategorias.store');
    Route::get('/{id}', [AdminCategoriasController::class, 'show'])->name('admincategorias.show');
    Route::get('/{id}/edit', [AdminCategoriasController::class, 'edit'])->name('admincategorias.edit');
    Route::put('/{id}', [AdminCategoriasController::class, 'update'])->name('admincategorias.update');
    Route::delete('/{id}', [AdminCategoriasController::class, 'delete'])->name('admincategorias.delete');
});

// Usuarios
Route::prefix('admin/usuarios')->group(function () {
    Route::get('/', [AdminUsersController::class, 'index'])->name('adminusuarios.index');
    Route::get('/{id}', [AdminUsersController::class, 'show'])->name('adminusuarios.show');
    Route::get('/{id}/edit', [AdminUsersController::class, 'edit'])->name('adminusuarios.edit');
    Route::put('/{id}', [AdminUsersController::class, 'update'])->name('adminusuarios.update');
    Route::delete('/{id}', [AdminUsersController::class, 'delete'])->name('adminusuarios.delete');
    Route::get('admin/usuarios/create', [AdminUsersController::class, 'create'])->name('adminusuarios.create');
    Route::post('admin/usuarios', [AdminUsersController::class, 'store'])->name('adminusuarios.store');

});
require __DIR__.'/auth.php';
