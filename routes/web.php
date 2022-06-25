<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/dashboard'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'dashboardController@index')->name('dashboard');
        // Data Penghulu
        Route::get('/data/penghulu', 'backend\dataPenghuluController@index')->name('data-penghulu');
        // Data Pasangan
        Route::get('/data/pasangan', 'backend\dataPasanganController@index')->name('data-pasangan');
        Route::get('/data/create-pasangan', 'backend\dataPasanganController@create')->name('data-pasangan-create');
        Route::post('data/store-pasangan', 'backend\dataPasanganController@store')->name('data-pasangan-store');
        Route::delete('data/delete-pasangan/{id}', 'backend\dataPasanganController@delete')->name('data-pasangan-delete');
        // Data Jadwal Pasangan
        Route::get('/data/jadwal-pasangan', 'Backend\dataJadwalPernikahanController@index')->name('data-jadwal-pasangan');
        // Data Pernikahan
        Route::get('data/pernikahan', 'Backend\dataPernikahanController@index')->name('data-pernikahan');
        // Data Arsip Pernikahan
        Route::get('data/arsip-pernikahan', 'Backend\dataArsipPernikahanController@index')->name('data-arsip-pernikahan');
        // Register Pegawai
        Route::get('register-pegawai', 'Backend\registerPegawaiController@index')->name('register-pegawai');
    });
});
