<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [\App\Http\Controllers\UsersController::class, 'login']);


Route::group(['middleware' => ['authrole:admin']], function () {
    Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'home']);

    Route::get('/admin/kategori', [\App\Http\Controllers\SertifikasiController::class, 'index']);
    Route::post('/admin/kategori/create', [\App\Http\Controllers\SertifikasiController::class, 'create']);

    Route::get('/admin/users', [\App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/admin/users/detail/{id}', [\App\Http\Controllers\UsersController::class, 'detail']);
});
Route::group(['middleware' => ['authrole:sdm']], function () {
    Route::get('/sdm/home', [\App\Http\Controllers\SdmController::class, 'home']);

    Route::get('/sdm/sertifikasi', [\App\Http\Controllers\UserSertifikasiController::class, 'index']);
    Route::get('/sdm/sertifikasi/detail/{id}', [\App\Http\Controllers\SertifikasiController::class, 'show']);
    Route::post('/sdm/sertifikasi/save', [\App\Http\Controllers\SertifikasiController::class, 'store']);
});
