<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\DataKaryawanController;
use App\Http\Controllers\User\LaporanController;


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
// Route::get('/', function () {
//     return view('welcome');


// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('admin.home');


Route::prefix('admin')->middleware('role:admin')->namespace('Admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::get('/createkaryawan', 'TambahKaryawanController@create1')->name('admin.input1.createkaryawan');
    Route::post('/createkaryawan/import', 'TambahKaryawanController@import_excel')->name('admin.input1.import');

    Route::get('/createinformasi',[InformasiController::class, 'createinformasi'])->name('admin.input2.createinformasi');
    Route::post('/createinformasi',[InformasiController::class, 'store'])->name('admin.input2.createinformasi.store');
    Route::get('/detailinformasi',[InformasiController::class, 'detailinformasi'])->name('admin.input2.detailinformasi');
    Route::get('/editinformasi/{informasi}',[InformasiController::class, 'editinformasi'])->name('admin.input2.editinformasi');
    Route::patch('/editinformasi/{id}',[InformasiController::class, 'update'])->name('admin.input2.editinformasi.update');
    Route::delete('/editinformasi/{informasi}',[InformasiController::class, 'destroy'])->name('admin.input2.detailinformasi.delete');
    
    Route::get('/karyawan',[DataKaryawanController::class, 'karyawan'])->name('admin.input3.karyawan');
    Route::post('/karyawan',[DataKaryawanController::class, 'store'])->name('admin.input3.karyawan.store');
    Route::get('/detailkaryawan',[DataKaryawanController::class, 'detailkaryawan'])->name('admin.input3.detailkaryawan');
    Route::get('/editkaryawan/{data}',[DataKaryawanController::class, 'editkaryawan'])->name('admin.input3.editkaryawan');
    Route::patch('/editkaryawan/{id}',[DataKaryawanController::class, 'update'])->name('admin.input3.editkaryawan.update');
    Route::delete('/detailkaryawan/{data}',[DataKaryawanController::class, 'destroy'])->name('admin.input3.detailkaryawan.delete');


});

Route::prefix('karyawan')->middleware('role:user')->namespace('User')->group(function () {

    Route::get('/', 'HomeController@index')->name('user.home');

    Route::get('/informasi',[LaporanController::class, 'informasi'])->name('user.input1.informasi');
    Route::get('/createlaporan',[LaporanController::class, 'createlaporan'])->name('user.input1.createlaporan');
 
});


