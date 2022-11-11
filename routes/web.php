<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontakController;

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


 //////////-> NAVBAR VIEW <-//////////
Route::get('/', fn() => view('home'));
Route::get('/tentang-kami', fn() => view('tentang-kami'));
Route::get('/kegiatan-sekolah', fn() => view('kegiatan-sekolah'));
Route::get('/ekstrakulikuler', fn() => view('ekstrakulikuler'));

Route::get('/form-alumni', fn() => view('form-alumni'));
Route::post('/form-alumni-proses', [AlumniController::class, 'register']);

Route::get('/kontak', fn() => view('kontak'));
Route::post('/kontak-proses', [KontakController::class, 'kontakMasuk']);

 //////////-> LOGIN - LOGOUT <-//////////
Route::get('/login@@', [LoginController::class, 'UserLogin'])->name('login');
Route::get('/logout@@', [LoginController::class, 'UserLogout']);
Route::post('/login@@', [LoginController::class, 'LogProses']);

 ////////// ↓ ADMIN VIEW ↓ //////////

 //////////-> MIDDLEWARE <-//////////

Route::middleware('auth')->group( function() {
    Route::get('admin/login', fn() => view('admin.login') );
    Route::get('/adminsmpinh@@', fn() => view('admin.index'));
    Route::get('/admin/dashboard', [DashboardController::class, 'jumlahalumni'])->name('jumlahalumni');
    // Route::get('/admin/dashboard', [DashboardController::class, 'grafik'])->name('grafik');

     //////////-> GURU CRUD <-//////////
    Route::get('/admin/guru/data-guru', [GuruController::class, 'DataGuru']);
    Route::post('/admin/guru/add-guru', [GuruController::class, 'createGuru']);
    Route::post('/admin/guru/edit-guru/{guru}', [GuruController::class, 'editGuru']);
    Route::get('/admin/guru/delete-guru/{guru}', [GuruController::class, 'deleteGuru']);

    // EXPORT PDF
    Route::get('/guruexportpdf', [GuruController::class, 'guruexportpdf'])->name('guruexportpdf');
    // EXPORT - IMPORT EXCEL
    Route::get('/guruexportexcel', [GuruController::class, 'guruexportexcel'])->name('guruexportexcel');
    Route::post('/guruimportexcel', [GuruController::class, 'guruimportexcel'])->name('guruimportexcel');


    //////////-> ALUMNI CRUD -<//////////
    Route::get('/admin/alumni/data-alumni', [AlumniController::class, 'DataAlumni']);
    Route::post('/admin/alumni/add-alumni', [AlumniController::class, 'CreateAlumni']);
    Route::post('/admin/alumni/edit-alumni/{alumni}', [AlumniController::class, 'EditAlumni']);
    Route::get('/admin/alumni/delete-alumni/{alumni}', [AlumniController::class, 'DeleteAlumni']);
    // EXPORT PDF
    Route::get('/alumniexportpdf', [AlumniController::class, 'alumniexportpdf'])->name('alumniexportpdf');
    // EXPORT - IMPORT EXCEL
    Route::get('/alumniexportexcel', [AlumniController::class, 'alumniexportexcel'])->name('alumniexportexcel');
    Route::post('/alumniimportexcel', [AlumniController::class, 'alumniimportexcel'])->name('alumniimportexcel');


    //////////-> USERS CRUD -<//////////
    Route::get('admin/users/data-users', [UserController::class, 'DataUsers']);
    Route::post('admin/users/add-users', [UserController::class, 'CreateUsers']);
    Route::post('admin/users/edit-users/{user}', [UserController::class, 'EditUsers']);
    Route::get('admin/users/delete-users/{user}', [UserController::class, 'DeleteUsers']);

    //////////-> KONTAK MASUK <-//////////
    Route::get('admin/kontak/data-kontak', [KontakController::class, 'kontakAdmin']);
    Route::get('admin/kontak/delete-kontak/{kontak}', [KontakController::class, 'deleteKontak']);
});
