<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController;

// Ruta inicial
Route::get('/', function () {
    return redirect()->route('pacientes.index');
});

// CRUD Pacientes
Route::resource('pacientes', PacienteController::class);

// CRUD Tratamientos (anidado dentro de pacientes)
Route::resource('pacientes.tratamientos', TratamientoController::class)->except(['show']);
