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
})->name('landing');


Route::middleware(['guest'])->group(function (){
    
    Route::get('/login/{type}', [AuthController::class,'login'])->name('login');
    
    Route::get('/register/{type}', [AuthController::class,'register']);
    
    Route::post('/prosesRegister',[AuthController::class,'prosesRegister']);
    
    Route::get('/detailPenjual/{id}', [AuthController::class,'detailPenjual']);
    
    Route::get('/detailPartner/{id}', [AuthController::class,'detailPartner']);
    
    Route::post('/prosesLogin',[AuthController::class,'prosesLogin']);
});

// pembeli
Route::middleware(['auth'])->group(function (){
    
});
Route::get('/admin', function(){
    return "OK";
})->middleware('admin');

// pembeli
Route::middleware(['penjual'])->group(function (){

});

Route::get('/logout',[AuthController::class,'prosesLogout']);

Route::get('/home',function() {
    return view('home');
})->middleware('auth')->name('home');