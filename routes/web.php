<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    //Buat Route untuk  menampilkan form login dengan nama route 'login'
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    //POST LOGIN untuk check password
    Route::post('/login', [AuthController::class, 'check']);
    //ROUTE LOGOUT
    Route::get('/logout', [AuthController::class, 'logout']);


Route::prefix('/dashboard')->group(function () {
   
   
   
    //persuratan
    Route::get('/surat', [SuratController::class, 'index']);

});