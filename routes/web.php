<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;


Route::get('/get-csrf/', [VariosController::class, 'obtenerCsrf'])->name('varios.obtener-csrf');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/cuentas/', [CuentasController::class, 'listado'])->name('cuentas.listado');

Route::get('/categorias/', [CategoriasController::class, 'listado'])->name('categorias.listado');
Route::post('/categorias/agregar', [CategoriasController::class, 'agregar'])->name('categorias.agregar');

