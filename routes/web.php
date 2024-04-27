<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisBeasiswaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Models\JenisBeasiswa;
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
    $jenisBeasiswa = JenisBeasiswa::limit(6)->get();
    $selectedMenu = null;
    return view('beamurid-beasiswa.landing_page', compact("jenisBeasiswa", "selectedMenu"));
});

Route::get("/jenis-beasiswa", [JenisBeasiswaController::class, 'index'])->name("jenis_beasiswa.index");
Route::get("/pendaftaran", [PendaftaranController::class, 'index'])->name("pendaftaran.index");
Route::post("/pendaftaran-process", [PendaftaranController::class, 'daftar'])->name("pendaftaran.daftar");
Route::get("/hasil", [MahasiswaController::class, 'hasil_beasiswa'])->name("mahasiswa.hasil_beasiswa");
Route::get("/login", [UserController::class, 'index'])->name("user.login");
Route::post("/cek-hasil", [MahasiswaController::class, 'cek_hasil_beasiswa'])->name("mahasiswa.cek_hasil");

Route::get("/akademis/dashboard", [AdminController::class, 'index'])->name("akademis.dashboard");

Route::get("/akademis/beasiswa", [AdminController::class, 'beasiswa'])->name("akademis.beasiswa");
Route::get("/akademis/add-beasiswa", [AdminController::class, 'addBeasiswa'])->name("akademis.add_beasiswa");
Route::post("/akademis/add-beasiswa-process", [AdminController::class, 'addBeasiswaProcess'])->name("akademis.add_beasiswa_process");
Route::get("/akademis/update-beasiswa/{slug}", [AdminController::class, 'editBeasiswa'])->name("akademis.update_beasiswa");
Route::post("/akademis/update-beasiswa-process", [AdminController::class, 'editBeasiswaProcess'])->name("akademis.update_beasiswa_process");
Route::post("/akademis/remove-beasiswa/{slug}", [AdminController::class, 'removeBeasiswa'])->name("akademis.remove_beasiswa");

Route::get("/akademis/mahasiswa", [AdminController::class, 'mahasiswa'])->name("akademis.mahasiswa");
Route::get("/akademis/add-mahasiswa", [AdminController::class, 'addMahasiswa'])->name("akademis.add_mahasiswa");
Route::post("/akademis/add-mahasiswa-process", [AdminController::class, 'addMahasiswaProcess'])->name("akademis.add_mahasiswa_process");
Route::get("/akademis/update-mahasiswa/{slug}", [AdminController::class, 'editMahasiswa'])->name("akademis.update_mahasiswa");
Route::post("/akademis/update-mahasiswa-process", [AdminController::class, 'editMahasiswaProcess'])->name("akademis.update_mahasiswa_process");
Route::get("/akademis/remove-mahasiswa/{slug}", [AdminController::class, 'removeMahasiswa'])->name("akademis.remove_mahasiswa");

Route::get("/akademis/pendaftaran", [AdminController::class, 'pendaftaran'])->name("akademis.pendaftaran");
Route::get("/akademis/add-pendaftaran", [AdminController::class, 'addPendaftaran'])->name("akademis.add_pendaftaran");
Route::post("/akademis/add-pendaftaran-process", [AdminController::class, 'addPendaftaranProcess'])->name("akademis.add_pendaftaran_process");
Route::get("/akademis/update-pendaftaran/{slug}", [AdminController::class, 'editPendaftaran'])->name("akademis.update_pendaftaran");

Route::post("/akademis/update-pendaftaran-process/{slug}", [AdminController::class, 'editPendaftaranProcess'])->name("akademis.update_pendaftaran_process");
Route::post("/akademis/remove-pendaftaran/{slug}", [AdminController::class, 'removePendaftaran'])->name("akademis.remove_pendaftaran");

Route::get("/akademis/admin", [AdminController::class, 'admin'])->name("akademis.admin");
Route::get("/akademis/add-admin", [AdminController::class, 'addAdmin'])->name("akademis.add_admin");
Route::post("/akademis/add-admin-process", [AdminController::class, 'addAdminProcess'])->name("akademis.add_admin_process");
Route::get("/akademis/update-admin/{slug}", [AdminController::class, 'editAdmin'])->name("akademis.update_admin");
Route::post("/akademis/update-admin-process", [AdminController::class, 'editAdminProcess'])->name("akademis.update_admin");
Route::post("/akademis/remove-admin/{slug}", [AdminController::class, 'removeAdmin'])->name("akademis.remove_admin");

Route::get("/akademis/nilai", [AdminController::class, 'nilai'])->name("akademis.nilai");
Route::get("/akademis/add-nilai", [AdminController::class, 'addNilai'])->name("akademis.add_nilai");
Route::post("/akademis/add-nilai-process/{slug}", [AdminController::class, 'addNilaiProcess'])->name("akademis.add_nilai_process");
Route::get("/akademis/update-nilai/{slug}", [AdminController::class, 'editNilai'])->name("akademis.update_nilai");

Route::post("/akademis/update-nilai-process", [AdminController::class, 'editNilaiProcess'])->name("akademis.update_nilai_process");
Route::post("/akademis/remove-nilai/{slug}", [AdminController::class, 'removeNilai'])->name("akademis.remove_nilai");


Route::get("/akademis/login", [UserController::class, 'login'])->name("akademis.login");
Route::post("/akademis/login-process", [UserController::class, 'loginProcess'])->name("akademis.loginProcess");
Route::get("/akademis/register", [MahasiswaController::class, 'register'])->name("akademis.register");
Route::post("/akademis/register-process", [MahasiswaController::class, 'registerProcess'])->name("akademis.registerProcess");
