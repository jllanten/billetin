<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;


Route::get('/cuentas/', [CuentasController::class, 'listado'])->name('cuentas.listado');


/*
Route::get('/', function () {
    return view('welcome');
});
 */
