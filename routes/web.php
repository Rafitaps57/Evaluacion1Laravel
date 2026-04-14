<?php

use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Route;

// Listado principal y filtros
Route::get('/', [RecetaController::class, 'index'])->name('recetas.index');

// Formulario de creación
Route::get('/receta/nueva', [RecetaController::class, 'create'])->name('recetas.create');

// Procesar el formulario con validación
Route::post('/receta', [RecetaController::class, 'store'])->name('recetas.store');

// Detalle de la receta
Route::get('/receta/{id}', [RecetaController::class, 'show'])->name('recetas.show');