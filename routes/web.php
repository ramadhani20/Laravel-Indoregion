<?php

use App\Http\Controllers\IndoRegionController;
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
    return view('welcome');
});

Route::get('/form', [IndoRegionController::class, 'index']);
Route::post('/kabupaten', [IndoRegionController::class, 'kabupaten'])->name('kabupaten');
Route::post('/kecamatan', [IndoRegionController::class, 'kecamatan'])->name('kecamatan');
Route::post('/desa', [IndoRegionController::class, 'desa'])->name('desa');
