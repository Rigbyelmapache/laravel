<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::post('auth/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('api.login');

Route::post('auth/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('api.register');


Route::middleware(['auth:sanctum'])->group(function () {
  
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('productos', [ProductoController::class, 'index']); // Obtener todos los productos
    Route::post('productos', [ProductoController::class, 'store']); // Crear nuevo producto
    Route::get('productos/{id}', [ProductoController::class, 'show']); // Mostrar un producto por id
    Route::put('productos/{id}', [ProductoController::class, 'update']); // Actualizar producto
    Route::delete('productos/{id}', [ProductoController::class, 'destroy']); // Eliminar producto
});



