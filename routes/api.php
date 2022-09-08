<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataUsersController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\SingkatanController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JenisMataPelajaranController;

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


Route::middleware('auth:sanctum')->group(function(){
    Route::resource('roles', RolesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('data-users', DataUsersController::class);
    Route::resource('singkatan', SingkatanController::class);
    Route::resource('jenis-mapel', JenisMataPelajaranController::class);
    Route::resource('mapel', MataPelajaranController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('pertemuan', PertemuanController::class);
});

Route::resource('register', RegisterController::class);
Route::resource('login', LoginController::class);


