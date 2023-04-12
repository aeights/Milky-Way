<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('landing',['title'=>'Milky Way.id']);
});

Route::get('/login/{type}', [AuthController::class,'login']);

Route::get('/register/{type}', [AuthController::class,'register']);

Route::get('/detail-penjual/{id}', [AuthController::class,'detailPenjual']);

Route::get('/detail-partner/{id}', [AuthController::class,'detailPartner']);
