<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/home', [MesasController::class, 'index']);

Route::get('/mesas/{id}', [MesasController::class, 'show']);
Route::post('/mesas', [MesasController::class, 'store']);
Route::put('/mesas/{id}', [MesasController::class, 'update']);
Route::delete('/mesas/{id}', [MesasController::class, 'destroy']);

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

Route::get('/tipo_producto', [TipoProductoController::class, 'index']);
Route::get('/tipo_producto/{id}', [TipoProductoController::class, 'show']);
Route::post('/tipo-producto', [TipoProductoController::class, 'store']);
Route::put('/tipo_producto/{id}', [TipoProductoController::class, 'update']);
Route::delete('/tipo_producto/{id}', [TipoProductoController::class, 'destroy']);




