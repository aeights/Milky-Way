<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardSellerController;
use App\Http\Controllers\HomeBuyerController;
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

    Route::get('/login/{type}/lupaPassword', [AuthController::class,'lupaPassword']);

    Route::post('/login/{type}/lupaPassword/reset', [AuthController::class,'prosesLupaPassword']);
    
    Route::post('/prosesRegister',[AuthController::class,'prosesRegister']);
    
    Route::get('/detailPenjual/{id}', [AuthController::class,'detailPenjual']);
    
    Route::get('/detailPartner/{id}', [AuthController::class,'detailPartner']);
    
    Route::post('/prosesLogin',[AuthController::class,'prosesLogin']);

    Route::post('/prosesPenjual',[AuthController::class,'prosesPenjual']);

    Route::post('/prosesPartner',[AuthController::class,'prosesPartner']);
});

// pembeli
Route::middleware(['auth','user_role:pembeli'])->group(function (){
    Route::get('/home',[HomeBuyerController::class,'home'])->name('home');
});

// penjual
Route::middleware(['auth','user_role:penjual'])->group(function (){
    //Barang
    Route::get('/dashboardPenjual',[DashboardSellerController::class,'dashboardPenjual']);
    
    Route::get('/dashboardPenjual/barang',[DashboardSellerController::class,'barang'])->name('barang');
    
    Route::get('/dashboardPenjual/barang/tambah',[DashboardSellerController::class,'tambah']);
    
    Route::post('/tambahBarang',[DashboardSellerController::class,'tambahBarang']);
    
    Route::get('/dashboardPenjual/barang/edit/{id}',[DashboardSellerController::class,'edit']);
    
    Route::post('/editBarang/{id}',[DashboardSellerController::class,'editBarang']);
    
    Route::post('/hapusBarang/{id}',[DashboardSellerController::class,'hapusBarang']);

    Route::get('/profilePenjual',[DashboardSellerController::class,'profile']);

    Route::get('/profilePenjual/edit',[DashboardSellerController::class,'editProfile']);

    Route::post('/profilePenjual/prosesEdit',[DashboardSellerController::class,'prosesEditProfile']);

    Route::get('/batalProfile',[DashboardSellerController::class,'batalProfile']);

    Route::get('/resetPasswordPenjual',[DashboardSellerController::class,'resetPassword']);

    Route::post('/proses/resetPasswordPenjual',[DashboardSellerController::class,'prosesReset']);

    Route::get('/batalBarang',[DashboardSellerController::class,'batalBarang']);

    //Pengiriman
    Route::get('/dashboardPenjual/pengiriman',[DashboardSellerController::class,'pengiriman'])->name('pengiriman');
    
    Route::get('/dashboardPenjual/pengiriman/tambahBiaya',[DashboardSellerController::class,'tambahBiaya']);

    Route::get('/batalPengiriman',[DashboardSellerController::class,'batalPengiriman']);

    Route::post('/tambahBiayaPengiriman',[DashboardSellerController::class,'tambahBiayaPengiriman']);

    Route::get('/dashboardPenjual/pengiriman/edit/{id}',[DashboardSellerController::class,'editBiaya']);
    
    Route::post('/editBiayaPengiriman',[DashboardSellerController::class,'editBiayaPengiriman']);
    
    Route::post('/hapusBiaya/{id}',[DashboardSellerController::class,'hapusBiaya']);
});

//partner
Route::middleware(['partner'])->group(function (){

});

Route::get('/logout',[AuthController::class,'prosesLogout']);

# Admin
Route::get('/admin', function(){
    return "OK";
})->middleware('admin');