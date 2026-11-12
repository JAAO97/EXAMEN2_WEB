<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('medicamentos', MedicamentoController::class);

    Route::resource('proveedores', ProveedorController::class);

    Route::resource('empleados', EmpleadoController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});