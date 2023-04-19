<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardSellerController;
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


Route::middleware(['guest'])->group(function (){
    Route::get('/', function () {
        return view('landing',['title'=>'Milky Way.id']);
    })->name('landing');
    
    Route::get('/login/{type}', [AuthController::class,'login'])->name('login');
    
    Route::get('/register/{type}', [AuthController::class,'register']);
    
    Route::post('/prosesRegister',[AuthController::class,'prosesRegister']);
    
    Route::get('/detailPenjual/{id}', [AuthController::class,'detailPenjual']);
    
    Route::get('/detailPartner/{id}', [AuthController::class,'detailPartner']);
    
    Route::post('/prosesLogin',[AuthController::class,'prosesLogin']);

    Route::post('/prosesPenjual',[AuthController::class,'prosesPenjual']);

    Route::post('/prosesPartner',[AuthController::class,'prosesPartner']);
});

// pembeli
Route::middleware(['auth'])->group(function (){
    Route::get('/home',function() {
        return view('home');
    })->name('home');
});


// penjual
Route::middleware(['penjual'])->group(function (){
    
});

//partner
Route::middleware(['partner'])->group(function (){

});

Route::get('/logout',[AuthController::class,'prosesLogout']);

# Penjual
Route::get('/dashboardPenjual',[DashboardSellerController::class,'dashboardPenjual']);

Route::get('/dashboardPenjual/barang',[DashboardSellerController::class,'barang']);

Route::get('/dashboardPenjual/barang/tambah',[DashboardSellerController::class,'tambah']);

Route::post('/tambahBarang',[DashboardSellerController::class,'tambahBarang']);

Route::get('/dashboardPenjual/barang/edit',[DashboardSellerController::class,'edit']);

# Admin
Route::get('/admin', function(){
    return "OK";
})->middleware('admin');