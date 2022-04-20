<?php

use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\DisconnectController;
use App\Http\Controllers\ExeSummController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaanLapanganController;
use App\Http\Controllers\ProgresLapanganController;
use App\Http\Controllers\OloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\RekapProgressController;
use App\Http\Controllers\IncidentDomainController;
use App\Models\Database;
use App\Models\ProgresLapangan;
use App\Models\DeploymentTabel;
use App\Imports\ImportAssurance;
use App\Models\PekerjaanLapangan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserManagementController;
use App\Models\Rekap;
use Maatwebsite\Excel\Row;


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

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

// Route Database
// Route::get('/database', [DatabaseController::class, 'index'])->name('database.index')->middleware('auth');
// Route::post('/database/tambah', [DatabaseController::class, 'store'])->name('database.store');
// Route::get('/database/edit/{database}', [DatabaseController::class, 'edit'])->name('database.edit');
// Route::put('/database/update/', [DatabaseController::class, 'update'])->name('database.update');
// Route::delete('/database/delete/{database}', [DatabaseController::class, 'destroy'])->name('database.destroy');

// Pekerjaan Lapangan Route
Route::get('/pekerjaan_lapangan', [PekerjaanLapanganController::class, 'index'])->name('pekerjaan_lapangan.index')->middleware('auth');
Route::get('/pekerjaan_lapangan/create', [PekerjaanLapanganController::class, 'create'])->name('pekerjaan_lapangan.create')->middleware('editor');
Route::post('/pekerjaan_lapangan/tambah', [PekerjaanLapanganController::class, 'store'])->name('pekerjaan_lapangan.store');
Route::get('/pekerjaan_lapangan/edit/{pekerjaan_lapangan}', [PekerjaanLapanganController::class, 'edit'])->name('pekerjaan_lapangan.edit')->middleware('editor');
Route::put('/pekerjaan_lapangan/update/{pekerjaan_lapangan}', [PekerjaanLapanganController::class, 'update'])->name('pekerjaan_lapangan.update');
Route::delete('/pekerjaan_lapangan/delete/{pekerjaan_lapangan}', [PekerjaanLapanganController::class, 'destroy'])->name('pekerjaan_lapangan.destroy');
Route::get('/export/pekerjaan_lapangan', [PekerjaanLapanganController::class, 'exportPekerjaanLapangan'])->name('pekerjaan_lapangan.export');
Route::post('/import/pekerjaan_lapangan', [PekerjaanLapanganController::class, 'importPekerjaanLapangan'])->name('pekerjaan_lapangan.import');


// database
Route::get('/database', [DatabaseController::class, 'index'])->name('database.index')->middleware('admin');
Route::get('/database/create', [DatabaseController::class, 'create'])->name('database.create')->middleware('admin');
Route::post('/database/tambah', [DatabaseController::class, 'store'])->name('database.store');
Route::get('/database/edit/{database}', [DatabaseController::class, 'edit'])->name('database.edit')->middleware('admin');
Route::put('/database/update/{database}', [DatabaseController::class, 'update'])->name('database.update');
Route::delete('/database/delete/{database}', [DatabaseController::class, 'destroy'])->name('database.destroy');
Route::get('/export/database', [DatabaseController::class, 'databaseexport'])->name('database.export');
Route::post('/import/database', [DatabaseController::class, 'databaseimport'])->name('database.import');


// end of database

// WFM

Route::get('/wfm/create', [WfmController::class, 'create'])->name('wfm.create')->middleware('editor');
Route::post('/wfm/store', [WfmController::class, 'store'])->name('wfm.store');
Route::get('/wfm/edit/{wfm}', [WfmController::class, 'edit'])->name('wfm.edit')->middleware('editor');
Route::put('/wfm/update/{wfm}', [WfmController::class, 'update'])->name('wfm.update');
Route::delete('/wfm/delete/{wfm}', [WfmController::class, 'destroy'])->name('wfm.delete');
Route::get('/export/wfm', [WfmController::class, 'exportWfm'])->name('wfm.export');
Route::post('/import/wfm', [WfmController::class, 'importWfm'])->name('wfm.import');
// end of wfm
// rekap
Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index')->middleware('auth');
Route::get('/rekap/create', [RekapController::class, 'create'])->name('rekap.create')->middleware('editor');
Route::post('/rekap/store', [RekapController::class, 'store'])->name('rekap.store');
Route::get('/rekap/edit/{rekap}', [RekapController::class, 'edit'])->name('rekap.edit')->middleware('editor');
Route::put('/rekap/update/{rekap}', [RekapController::class, 'update'])->name('rekap.update');
Route::delete('/rekap/delete/{rekap}', [RekapController::class, 'destroy'])->name('rekap.destroy');
Route::get('/rekap/export', [RekapController::class, 'exportRekap'])->name('rekap.export');
Route::post('/import/rekap', [RekapController::class, 'importRekap'])->name('rekap.import');

// rekap progress
Route::get('/rekap_progress', [RekapProgressController::class, 'index'])->name('rekapProgress.index')->middleware('auth');
Route::get('/rekap_progress/export', [RekapProgressController::class, 'exportRekapProgress'])->name('rekapProgress.export');

// progress lapangan
Route::get('/progress_lapangan', [ProgresLapanganController::class, 'index'])->name('progress.index')->middleware('auth');
Route::get('/progress_lapangan/create', [ProgresLapanganController::class, 'create'])->name('progress.create')->middleware('editor');
Route::post('/progress_lapangan/store', [ProgresLapanganController::class, 'store'])->name('progress.store');
Route::get('/progress_lapangan/edit/{progress}', [ProgresLapanganController::class, 'edit'])->name('progress.edit')->middleware('editor');
Route::put('/progress_lapangan/update/{progress}', [ProgresLapanganController::class, 'update'])->name('progress.update');
Route::delete('/progress_lapangan/update/{progress}', [ProgresLapanganController::class, 'destroy'])->name('progress.destroy');
Route::get('/progress_lapangan/export-progress_lapangan', [ProgresLapanganController::class, 'exportProgressLapangan'])->name('progress.export');
Route::post('/import/progress_lapangan', [ProgresLapanganController::class, 'importProgressLapangan'])->name('progress.import');

// deployment
Route::get('/deployment', [DeploymentController::class, 'index'])->name('deployment.index')->middleware('auth');
Route::get('/deployment/create', [DeploymentController::class, 'create'])->name('deployment.create')->middleware('editor');
Route::post('/deployment/store', [DeploymentController::class, 'store'])->name('dep.store');
Route::get('/deployment/edit/{deployment}', [DeploymentController::class, 'edit'])->name('dep.edit')->middleware('editor');
Route::put('/deployment/update/{deployment}', [DeploymentController::class, 'update'])->name('dep.update');
Route::delete('/deployment/delete/{deployment}', [DeploymentController::class, 'destroy'])->name('dep.destroy');
Route::get('/deployment/export-deployment',[DeploymentController::class,'exportDeployment'])->name('deployment.export');
// assurance
Route::get('/assurance', [AssuranceController::class, 'index'])->name('assurance.index')->middleware('auth');
Route::get('/assurance/create', [AssuranceController::class, 'create'])->name('assurance.create')->middleware('editor');
Route::post('/assurance/store', [AssuranceController::class, 'store'])->name('assurance.store')->middleware('editor');
Route::get('/assurance/edit/{assurance}', [AssuranceController::class, 'edit'])->name('assurance.edit')->middleware('editor');
Route::put('/assurance/update/{assurance}', [AssuranceController::class, 'update'])->name('assurance.update')->middleware('editor');
Route::delete('/assurance/destroy/{assurance}', [AssuranceController::class, 'destroy'])->name('assurance.destroy')->middleware('editor');
Route::get('/assurance/export-assurance',[AssuranceController::class,'exportAssurance'])->name('assurance.export');
Route::post('/assurance/import-assurance', [AssuranceController::class, 'importAssurance'])->name('assurance.import');



// disconnect
Route::get('/disconnect', [DisconnectController::class, 'index'])->name('disconnect.index')->middleware('auth');
Route::get('/disconnect/edit/{disconnect}', [DisconnectController::class, 'edit'])->name('disconnect.edit')->middleware('editor');
Route::put('/disconnect/update/{disconnect}', [DisconnectController::class, 'update'])->name('disconnect.update');
Route::delete('/disconnect/delete/{disconnect}', [DisconnectController::class, 'destroy'])->name('disconnect.destroy');

// db_olo
Route::get('/db_olo', [OloController::class, 'index'])->name('db_olo.index')->middleware('auth');
Route::get('/db_olo/create', [OloController::class, 'create'])->name('db_olo.create')->middleware('editor');
Route::post('/db_olo/store', [OloController::class, 'store'])->name('db_olo.store');
Route::get('/db_olo/edit/{olo}', [OloController::class, 'edit'])->name('db_olo.edit')->middleware('editor');
Route::put('/db_olo/update/{olo}', [OloController::class, 'update'])->name('db_olo.update');
Route::delete('/db_olo/delete/{olo}', [OloController::class, 'destroy'])->name('db_olo.destroy');
Route::get('/db_olo/export-olo',[OloController::class,'exportOlo'])->name('db_olo.export');

// db_produk
Route::get('/db_produk', [ProdukController::class, 'index'])->name('db_produk.index')->middleware('auth');
Route::get('/db_produk/create', [ProdukController::class, 'create'])->name('db_produk.create')->middleware('editor');
Route::post('/db_produk/store', [ProdukController::class, 'store'])->name('db_produk.store');
Route::get('/db_produk/edit/{produk}', [ProdukController::class, 'edit'])->name('db_produk.edit')->middleware('editor');
Route::put('/db_produk/update/{produk}', [ProdukController::class, 'update'])->name('db_produk.update');
Route::delete('/db_produk/delete/{produk}', [ProdukController::class, 'destroy'])->name('db_produk.destroy');
Route::get('/db_produk/export-produk',[ProdukController::class,'exportProduk'])->name('db_produk.export');

// db_satuan
Route::get('/db_satuan', [SatuanController::class, 'index'])->name('db_satuan.index')->middleware('auth');
Route::get('/db_satuan/create', [SatuanController::class, 'create'])->name('db_satuan.create')->middleware('editor');
Route::post('/db_satuan/store', [SatuanController::class, 'store'])->name('db_satuan.store');
Route::get('/db_satuan/edit/{satuan}', [satuanController::class, 'edit'])->name('db_satuan.edit')->middleware('editor');
Route::put('/db_satuan/update/{satuan}', [SatuanController::class, 'update'])->name('db_satuan.update');
Route::delete('/db_satuan/delete/{satuan}', [SatuanController::class, 'destroy'])->name('db_satuan.destroy');
Route::get('/db_satuan/export-satuan',[SatuanController::class,'exportSatuan'])->name('db_satuan.export');

// db_incident_domain
Route::get('/db_incident_domain', [IncidentDomainController::class, 'index'])->name('db_incident_domain.index')->middleware('auth');
Route::get('/db_incident_domain/create', [IncidentDomainController::class, 'create'])->name('db_incident_domain.create')->middleware('editor');
Route::post('/db_incident_domain/store', [IncidentDomainController::class, 'store'])->name('db_incident_domain.store');
Route::get('/db_incident_domain/edit/{satuan}', [IncidentDomainController::class, 'edit'])->name('db_incident_domain.edit')->middleware('editor');
Route::put('/db_incident_domain/update/{satuan}', [IncidentDomainController::class, 'update'])->name('db_incident_domain.update');
Route::delete('/db_incident_domain/delete/{satuan}', [IncidentDomainController::class, 'destroy'])->name('db_incident_domain.destroy');
Route::get('/db_incident_domain/export-satuan',[IncidentDomainController::class,'exportIncidentDomain'])->name('db_incident_domain.export');


//route EXE SUMM
Route::get('/exe_summ', [ExeSummController::class, 'index'])->name('xSumm.index')->middleware('auth');
Route::get('/exe_summ/edit/{exeSumm}', [ExeSummController::class, 'edit'])->name('xSumm.edit')->middleware('editor');
Route::put('/exe_summ/update/{exeSumm}', [ExeSummController::class, 'update'])->name('xSumm.update');
Route::delete('/exe_summ/delete/{exeSumm}', [ExeSummController::class, 'destroy'])->name('xSumm.destroy');

//route usermanagement
Route::get('/management', [UserManagementController::class, 'index'])->name('management.index')->middleware('admin');
Route::get('/management/create', [UserManagementController::class, 'create'])->name('management.create')->middleware('admin');
Route::post('/management/store', [UserManagementController::class, 'store'])->name('management.store');
Route::get('/management/edit/{user}', [UserManagementController::class, 'edit'])->name('management.edit')->middleware('admin');
Route::put('/management/update/{user}', [UserManagementController::class, 'update'])->name('management.update');
Route::delete('/management/delete/{user}', [UserManagementController::class, 'destroy'])->name('management.destroy');

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
