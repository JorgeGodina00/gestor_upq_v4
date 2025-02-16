<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lector\LectorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PTC\PTCController;


Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

//Rutas Rol Lector
Route::middleware(['auth','LectorMiddleware'])->group(function(){ 
    Route::get('/biblioteca', [LectorController::class, 'index'])->name('biblioteca');
});

//Rutas Rol Admin
Route::middleware(['auth','AdminMiddleware'])->group(function(){ 
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios'); // Mostrar lista de usuarios
    Route::get('/admin/usuarios/nuevo', [AdminController::class, 'create'])->name('admin.usuarios.create'); // Crear nuevo usuario
    Route::post('/admin/usuarios', [AdminController::class, 'store'])->name('admin.usuarios.store'); // Almacenar nuevo usuario
    Route::get('/admin/usuarios/{id}/edit', [AdminController::class, 'edit'])->name('admin.usuarios.edit'); // Editar usuario
    Route::put('/admin/usuarios/{id}', [AdminController::class, 'update'])->name('admin.usuarios.update'); // Actualizar usuario
    Route::delete('/admin/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.usuarios.destroy'); // Eliminar usuario
    Route::get('/admin/perfil', [AdminController::class, 'perfil'])->name('admin.perfil');
    Route::put('/admin/perfil', [AdminController::class, 'perfilUpdate'])->name('admin.perfil.update');
});

// Rutas del PTC
Route::group(['middleware' => ['auth', 'ptc']], function () {
    // Dashboard del PTC
    Route::get('/ptc/dashboard', [PTCController::class, 'index'])->name('ptc.dashboard');

    // Rutas para subir documentos
    Route::get('/ptc/documentos', [DocumentoController::class, 'index'])->name('ptc.documentos.index');
    Route::post('/ptc/documentos', [DocumentoController::class, 'store'])->name('ptc.documentos.store');
});