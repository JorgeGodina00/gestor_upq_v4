<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('Inicio');

Route::get('/gestion', function () {
    return view('gestion');
})->middleware(['auth', 'verified'])->name('Gestion');

Route::get('/docencia', function () {
    return view('docencia');
})->middleware(['auth', 'verified'])->name('Docencia');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware(['auth', 'verified'])->name('Perfil');

Route::get('/investigacion', function () {
    return view('investigacion');
})->middleware(['auth', 'verified'])->name('Investigacion');

Route::get('/tutoria', function () {
    return view('tutoria');
})->middleware(['auth', 'verified'])->name('Tutoria');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
