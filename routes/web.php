<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.master');
});

Route::get('/siswas', [SiswaController::class, 'index']);
Route::get('/siswas/create', [SiswaController::class, 'create']);
Route::post('/siswas', [SiswaController::class, 'store']);
Route::delete('/siswas/{siswa}', [SiswaController::class, 'destroy']);
Route::get('/siswas/{siswa}/edit', [SiswaController::class, 'edit']);
Route::patch('/siswas/{siswas}', [SiswaController::class, 'update']);