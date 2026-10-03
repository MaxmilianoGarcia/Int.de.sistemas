<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\EventoTransaccionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comercios', [ComercioController::class, 'index'])
    ->name('comercios.index');

Route::get('/transacciones', [TransaccionController::class, 'index'])
    ->name('transacciones.index');

Route::get('/eventos-transaccion', [EventoTransaccionController::class, 'index'])
    ->name('eventos-transaccion.index');

Route::get('/comercio/{id}', [ComercioController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('comercios.show');

Route::prefix('prueba-comercios')->name('prueba.')->group(function () {

    Route::get('/', function () {
        return 'Listado de comercios';
    })->name('index');

    Route::get('/{id}', function ($id) {
        return "Detalle del comercio $id";
    })->name('show')->where('id', '[0-9]+');

});

Route::get('/comercios-categoria/{categoria?}', function ($categoria = 'todos') {
    return "Mostrando comercios de la categoría: $categoria";
});