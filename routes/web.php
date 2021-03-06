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
use App\Http\Controllers\JenisNteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\RekapProgressController;
use App\Http\Controllers\IncidentDomainController;
use App\Http\Controllers\WitelController;
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


// db_witel
Route::get('/db_witel', [WitelController::class, 'index'])->name('db_witel.index')->middleware('auth');
Route::get('/db_witel/create', [WitelController::class, 'create'])->name('db_witel.create')->middleware('editor');
Route::post('/db_witel/store', [WitelController::class, 'store'])->name('db_witel.store');
Route::get('/db_witel/edit/{witel}', [WitelController::class, 'edit'])->name('db_witel.edit')->middleware('editor');
Route::put('/db_witel/update/{witel}', [WitelController::class, 'update'])->name('db_witel.update');
Route::delete('/db_witel/delete/{witel}', [WitelController::class, 'destroy'])->name('db_witel.destroy');
Route::get('/db_witel/export-witel',[WitelController::class,'exportWitel'])->name('db_witel.export');

// db_jenis_nte
Route::get('/db_jenis_nte', [JenisNteController::class, 'index'])->name('db_jenis_nte.index')->middleware('auth');
Route::get('/db_jenis_nte/create', [JenisNteController::class, 'create'])->name('db_jenis_nte.create')->middleware('editor');
Route::post('/db_jenis_nte/store', [JenisNteController::class, 'store'])->name('db_jenis_nte.store');
Route::get('/db_jenis_nte/edit/{witel}', [JenisNteController::class, 'edit'])->name('db_jenis_nte.edit')->middleware('editor');
Route::put('/db_jenis_nte/update/{witel}', [JenisNteController::class, 'update'])->name('db_jenis_nte.update');
Route::delete('/db_jenis_nte/delete/{witel}', [JenisNteController::class, 'destroy'])->name('db_jenis_nte.destroy');
Route::get('/db_jenis_nte/export-witel',[JenisNteController::class,'exportJenisNte'])->name('db_jenis_nte.export');

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

//route usermanagement_2
Route::get('/manage/edit/{user_2}', [UserManagementController::class, 'edit_2'])->name('management_2.edit_2')->middleware('editor');
Route::put('/manage/update/{user_2}', [UserManagementController::class, 'update_2'])->name('management_2.update_2');

//route usermanagement_3
Route::get('/manage_user/edit/{user_3}', [UserManagementController::class, 'edit_3'])->name('management_3.edit_3')->middleware('view');
Route::put('/manage_user/update/{user_3}', [UserManagementController::class, 'update_3'])->name('management_3.update_3');

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
