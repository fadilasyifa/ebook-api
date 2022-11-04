<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HeloController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BookController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
//});

//
// Task
// URL : http://localhost:8000/api/halo
// METHOD: GET
// Exec: function
// Return: JSON => {"me": "cantik"}
//
Route::get('halo', function(){
    $data = ["me" => "pretty"];

    return $data;
});

//Route::get('helocontroller', [HeloController::class, 'index']);
//Route::post('helocontroller', [HeloController::class, 'store']);
//Route::delete('helocontroller', [HeloController::class, 'destroy']);
Route::resource('helocontroller', HeloController::class);
Route::resource('/siswa', SiswaController::class);
Route::resource('/book', BookController::class);
