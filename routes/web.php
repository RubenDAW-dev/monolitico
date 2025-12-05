<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;


Route::get('/', [PagesController::class, 'home'])->name('home');


Route::get('/petitions', [PetitionController::class, 'index'])->name('petitions.index');
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

Route::get('/petitions/{id}/edit', [PetitionController::class, 'edit'])->name('petitions.edit');
Route::put('/petitions/{id}', [PetitionController::class, 'update'])->name('petitions.update');


Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



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

require __DIR__.'/auth.php';
