<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SymbolController;

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
 
Route::controller(SymbolController::class)->group(function () {
    Route::get('/prices', 'get');
    Route::post('/subscribe', 'subscribe');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
