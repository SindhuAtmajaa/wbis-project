<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KjppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//login
Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('login',[AuthController::class, 'loginproses'])->name('loginproses');

//logout
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

//middleware checkLogin
Route::middleware('checkLogin')->group(function () {
    //dashboard
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

    //Admin
    //Admin-user
    Route::get('user',[UserController::class, 'index'])->name('user');
    //Admin-user-Create
    Route::get('user/create',[UserController::class, 'create'])->name('userCreate');
    //Admin-user-Create-POST
    Route::post('user/store',[UserController::class, 'store'])->name('userStore');
    //Admin-ambil data-user-edit
    Route::get('user/edit/{id}',[UserController::class, 'edit'])->name('userEdit');
    //Admin-kirim data-user-edit
    Route::post('user/update/{id}',[UserController::class, 'update'])->name('userUpdate');
    //Admin-user-delete
    Route::delete('user/destroy/{id}',[UserController::class, 'destroy'])->name('userDestroy');
    //Admin-user-downlaod-excel
    Route::get('user/excel',[UserController::class, 'excel'])->name('userExcel');
    //Admin-user-downlaod-pdf
    Route::get('user/pdf',[UserController::class, 'pdf'])->name('userPdf');


    // //Admin-kjpp
    Route::get('kjpp',[KjppController::class, 'index'])->name('kjpp');

    // //Admin-nasabah
    Route::get('nasabah',[NasabahController::class, 'index'])->name('nasabah');
    Route::get('nasabah/create',[NasabahController::class, 'create'])->name('nasabahCreate');
    Route::post('nasabah/store',[NasabahController::class, 'store'])->name('nasabahStore');

    Route::get('nasabah/edit/{id}',[NasabahController::class, 'edit'])->name('nasabahEdit');
    Route::post('nasabah/update/{id}',[NasabahController::class, 'update'])->name('nasabahUpdate');
    Route::delete('nasabah/destroy/{id}',[NasabahController::class, 'destroy'])->name('nasabahDestroy');

    Route::post('nasabah/verify/{id}', [NasabahController::class, 'verify'])->name('nasabahVerify');
    Route::post('nasabah/cancel/{id}', [NasabahController::class, 'cancel'])->name('nasabahCancel');
});

// //dashboard
// Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

// //Admin-user
// Route::get('user',[UserController::class, 'index'])->name('user');

// //Admin-kjpp
// Route::get('kjpp',[KjppController::class, 'index'])->name('kjpp');