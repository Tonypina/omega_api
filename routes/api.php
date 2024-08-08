<?php

use Illuminate\Http\Request;
use App\Models\CatalogoTipoEquipo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PolizaController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CatalogoStatusController;
use App\Http\Controllers\CatalogoTipoEquipoController;

Route::middleware(['auth:api'])->group(function () {

    /**
     * Endpoint para cliente
     */
    Route::controller(ClienteController::class)->group(function () {
        Route::get('/cliente', 'index');
        Route::post('/cliente', 'store');
        Route::get('/cliente/{cliente}', 'show');
        Route::put('/cliente/{cliente}', 'update');
        Route::delete('/cliente/{cliente}', 'destroy');
    });

    /**
     * Endpoint para sucursal
     */
    Route::controller(SucursalController::class)->group(function () {
        Route::get('/sucursal', 'index');
        Route::post('/sucursal', 'store');
        Route::get('/sucursal/{sucursal}', 'show');
        Route::put('/sucursal/{sucursal}', 'update');
        Route::delete('/sucursal/{sucursal}', 'destroy');
    });

    /**
     * Endpoint para equipo
     */
    Route::controller(EquipoController::class)->group(function () {
        Route::get('/equipo', 'index');
        Route::post('/equipo', 'store');
        Route::get('/equipo/{equipo}', 'show');
        Route::put('/equipo/{equipo}', 'update');
        Route::delete('/equipo/{equipo}', 'destroy');
    });

    /**
     * Endpoint para poliza
     */
    Route::controller(PolizaController::class)->group(function () {
        Route::get('/poliza', 'index');
        Route::post('/poliza', 'store');
        Route::get('/poliza/{poliza}', 'show');
        Route::put('/poliza/{poliza}', 'update');
        Route::delete('/poliza/{poliza}', 'destroy');
    });

    /**
     * Endpoint para tecnico
     */
    Route::controller(TecnicoController::class)->group(function () {
        Route::get('/tecnico', 'index');
        Route::post('/tecnico', 'store');
        Route::get('/tecnico/{tecnico}', 'show');
        Route::put('/tecnico/{tecnico}', 'update');
        Route::delete('/tecnico/{tecnico}', 'destroy');
    });

    /**
     * Endpoint para vendedor
     */
    Route::controller(VendedorController::class)->group(function () {
        Route::get('/vendedor', 'index');
        Route::post('/vendedor', 'store');
        Route::get('/vendedor/{vendedor}', 'show');
        Route::put('/vendedor/{vendedor}', 'update');
        Route::delete('/vendedor/{vendedor}', 'destroy');
    });

    /**
     * Endpoint para ticket
     */
    Route::controller(TicketController::class)->group(function () {
        Route::get('/ticket', 'index');
        Route::post('/ticket', 'store');
        Route::get('/ticket/{ticket}', 'show');
        Route::put('/ticket/{ticket}', 'update');
        Route::delete('/ticket/{ticket}', 'destroy');
    });

    /**
     * Endpoint para tipo-equipo
     */
    Route::controller(CatalogoTipoEquipoController::class)->group(function () {
        Route::get('/tipo-equipo', 'index');
        Route::post('/tipo-equipo', 'store');
        Route::get('/tipo-equipo/{tipo-equipo}', 'show');
        Route::put('/tipo-equipo/{tipo-equipo}', 'update');
        Route::delete('/tipo-equipo/{tipo-equipo}', 'destroy');
    });

    /**
     * Endpoint para status
     */
    Route::controller(CatalogoStatusController::class)->group(function () {
        Route::get('/status', 'index');
        Route::post('/status', 'store');
        Route::get('/status/{status}', 'show');
        Route::put('/status/{status}', 'update');
        Route::delete('/status/{status}', 'destroy');
    });
});
