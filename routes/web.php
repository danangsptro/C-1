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
        // Data Pasangan
        Route::get('/data/pasangan', 'backend\dataPasanganController@index')->name('data-pasangan');
        Route::get('/data/create-pasangan', 'backend\dataPasanganController@create')->name('data-pasangan-create');
        Route::post('data/store-pasangan', 'backend\dataPasanganController@store')->name('data-pasangan-store');
        Route::delete('data/delete-pasangan/{id}', 'backend\dataPasanganController@delete')->name('data-pasangan-delete');
        Route::get('/data/pasangan-edit/{id}', 'backend\dataPasanganController@edit')->name('data-pasangan-edit');
        Route::post('/data/pasangan-edit/{id}', 'backend\dataPasanganController@update')->name('data-pasangan-update');
        // Data Jadwal Pasangan
        Route::get('/data/jadwal-pasangan', 'Backend\dataJadwalPernikahanController@index')->name('data-jadwal-pasangan');
        Route::get('/data/create-jadwal-pernikahan', 'Backend\dataJadwalPernikahanController@create')->name('data-create-jadwal-pasangan');
        Route::post('/data/store-jadwal-pernikahan', 'Backend\dataJadwalPernikahanController@store')->name('data-store-jadwal-pernikahan');
        Route::get('/data/edit-jadwal-pernikahan/{id}', 'Backend\dataJadwalPernikahanController@edit')->name('data-edit-jadwal-pernikahan');
        Route::post('/data/update-jadwal-pernikahan/{id}', 'Backend\dataJadwalPernikahanController@update')->name('data-update-jadwal-pernikahan');
        Route::post('/data/approve-jadwal-pernikahan/{id}', 'Backend\dataJadwalPernikahanController@approved')->name('data-approved-jadwal-pernikahan');
        Route::delete('/data/delete-jadwal-pernikahan/{id}', 'Backend\dataJadwalPernikahanController@delete')->name('data-delete-jadwal-pernikahan');
        // Data Pernikahan
        Route::get('data/pernikahan', 'Backend\dataPernikahanController@index')->name('data-pernikahan');
        // Data Arsip Pernikahan
        Route::get('data/arsip-pernikahan', 'Backend\dataArsipPernikahanController@index')->name('data-arsip-pernikahan');
        // Register Pegawai
        Route::get('register-pegawai', 'Backend\registerPegawaiController@index')->name('register-pegawai');
        Route::delete('register-pegawai-delete/{id}', 'Backend\registerPegawaiController@delete')->name('register-pegawai-delete');
        Route::post('register-pegawai-store/{id?}', 'Backend\registerPegawaiController@store')->name('register-pegawai-store');
        Route::get('profile', 'Backend\registerPegawaiController@profile')->name('profile');
        Route::post('/edit-profile/{id}', 'Backend\registerPegawaiController@editProfile')->name('edit-profile');
        Route::post('/update-password/{id}', 'Backend\registerPegawaiController@updatePassword')->name('update-password');
        // Laporan Pernikahan
        Route::get('/data-laporan-pernikahan', 'Backend\laporanDataPernikahanController@index')->name('laporan-pernikahan');
        Route::get('/data-laporan-pernikahan/approved', 'Backend\laporanDataPernikahanController@approved')->name('status-pernikahan-approved');
        Route::get('/data-laporan-pernikahan/rejected', 'Backend\laporanDataPernikahanController@rejected')->name('status-pernikahan-rejected');
        Route::get('/laporan-data-menikah', 'Backend\laporanDataPernikahanController@printDataApprove')->name('print-approve');
        Route::get('/laporan-data-belum-menikah', 'Backend\laporanDataPernikahanController@printDataNotApprove')->name('print-approve-belum-menikah');
        // Kelola Arsip Baru
        Route::get('/data-kelola-arsip-baru', 'Backend\kelolaArsipDataBaruController@index')->name('KelolaArsipDataBaru');
        Route::get('/data-kelola-arsip-baru/{id}', 'Backend\kelolaArsipDataBaruController@arsip')->name('KelolaArsipDataBaruCreate');
        Route::post('/data-kelola-arsip-store/{id}', 'Backend\kelolaArsipDataBaruController@createKelolaArsip')->name('KelolaArsipDataBaruStore');
        // Kelola Arsip Lama
        Route::get('/data-kelola-arsip-lama', 'Backend\kelolaArsipDataLamaController@index')->name('kelola-data-arsip-lama');
        Route::get('/data-kelola-arsip-lama-create', 'Backend\kelolaArsipDataLamaController@create')->name('kelola-data-arsip-lama-create');
        Route::post('/data-kelola-arsip-lama-store', 'Backend\KelolaArsipDataLamaController@createKelolaArsipLama')->name('kelola-data-arsip-lama-store');
        // Laporan Arsip
        Route::get('/data-laporan-arsip', 'Backend\laporanArsipController@index')->name('laporan-arsip');
        Route::get('/detail-arsip-baru', 'Backend\laporanArsipController@arsipBaru')->name('detail-arsip-baru');
        Route::get('/detail-arsip-lama', 'Backend\laporanArsipController@arsipLama')->name('detail-arsip-lama');
        Route::get('/print-laporan-arsip-baru', 'Backend\laporanArsipController@printKelolaArsipBaru')->name('print-kelola-arsip-baru');
        Route::get('/print-laporan-arsip-lama', 'Backend\laporanArsipController@printKelolaArsipLama')->name('print-kelola-arsip-lama');
        Route::get('/edit-laporan/{id}', 'Backend\laporanArsipController@editKelolaArsip')->name('edit-laporan-arsip');
        Route::post('/update-data-laporan-baru/{id}', 'Backend\laporanArsipController@update')->name('update-data-laporan');
        Route::post('/update-data-laporan-lama/{id}', 'Backend\laporanArsipController@update1')->name('update-data-laporan1');
    });
});
