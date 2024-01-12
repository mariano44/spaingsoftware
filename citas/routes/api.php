<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Worker;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'citas'
], function ($router) {
    Route::get('', [Worker::class, 'obtener']);
    Route::post("/agregar", [Worker::class, 'agregar']);
    Route::put("/actualizar", [Worker::class, 'actualizar']);
    Route::delete("/eliminar/{id}", [Worker::class, 'eliminar']);
});
