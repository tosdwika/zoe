<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\Riwayat_DaftarController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Dashboard
Route::get('/', [HomeController::class, 'dashboard']);

Route::group(['middleware' => ['auth', 'hakakses:1']], function () {
    //Admin
    Route::get('/allbiodata', [BiodataController::class, 'allbiodata'])->name('allbiodata');
    Route::get('/view_pdf/{id_biodata}', [BiodataController::class, 'pdf']);
    Route::get('/allbiodata/delete/{id_biodata}', [ApplyController::class, 'destroy']);
    //Tampil Biodata
    Route::get('/biodataupdateadmin/{id_biodata}', [BiodataController::class, 'tampilbiodataupdateadmin'])->name('biodataupdateadmin');
    Route::get('/biodataupdateadmin/{id_biodata}/pendidikanadmin/{id}', [BiodataController::class, 'tampilpendidikanadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pelatihanadmin/{id}', [BiodataController::class, 'tampilpelatihanadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pengalamanadmin/{id}', [BiodataController::class, 'tampilpengalamanadmin']);
    //Update Form
    Route::get('/updatebiodataformadmin/{id_biodata}', [BiodataController::class, 'updatebiodataformadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pendidikanadmin/{id}/updatependidikanformadmin/{id_pendidikan}', [BiodataController::class, 'updatependidikanformadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pelatihanadmin/{id}/updatepelatihanformadmin/{id_pelatihan}', [BiodataController::class, 'updatepelatihanformadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pengalamanadmin/{id}/updatepengalamanformadmin/{id_pengalaman}', [BiodataController::class, 'updatepengalamanformadmin']);
    //Update Method
    Route::post('/updatebiodataadminform/{id_biodata}', [BiodataController::class, 'updatebiodataadmin']);
    Route::post('/biodataupdateadmin/{id_biodata}/pelatihanadmin/{id}/updatepelatihanadmin/{id_pelatihan}', [BiodataController::class, 'updatepelatihanadmin']);
    Route::post('/biodataupdateadmin/{id_biodata}/pendidikanadmin/{id}/updatependidikanadmin/{id_pendidikan}', [BiodataController::class, 'updatependidikanadmin']);
    Route::post('/biodataupdateadmin/{id_biodata}/pengalamanadmin/{id}/updatepengalamanadmin/{id_pengalaman}', [BiodataController::class, 'updatepengalamanadmin']);
    //Delete Method
    Route::get('/biodata/deletebiodata/{id_biodata}', [BiodataController::class, 'deletebiodata']);
    Route::get('/biodata/deletependidikan/{id_pendidikan}', [BiodataController::class, 'deletependidikan']);
    Route::get('/biodata/deletepelatihan/{id_pelatihan}', [BiodataController::class, 'deletepelatihan']);
    Route::get('/biodata/deletepengalaman/{id_pengalaman}', [BiodataController::class, 'deletepengalaman']);
    //Delete Method X
    Route::get('/deletependidikanadmin/{id_pendidikan}', [BiodataController::class, 'deletependidikanadmin']);
    Route::get('/deletepelatihanadmin/{id_pelatihan}', [BiodataController::class, 'deletepelatihanadmin']);
    Route::get('/deletepengalamanadmin/{id_pengalaman}', [BiodataController::class, 'deletepengalamanadmin']);
    //Insert Form
    Route::get('/biodataupdateadmin/{id_biodata}/pendidikanadmin/{id}/pendidikan', [BiodataController::class, 'pendidikanadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pelatihanadmin/{id}/pelatihan', [BiodataController::class, 'pelatihanadmin']);
    Route::get('/biodataupdateadmin/{id_biodata}/pengalamanadmin/{id}/pengalaman', [BiodataController::class, 'pengalamanadmin']);
    //Insert Method
    Route::post('/biodataupdateadmin/{id_biodata}/pendidikanadmin/{id}/insertpendidikanadmin', [BiodataController::class, 'insertpendidikanadmin']);
    Route::post('/biodataupdateadmin/{id_biodata}/pelatihanadmin/{id}/insertpelatihanadmin', [BiodataController::class, 'insertpelatihanadmin']);
    Route::post('/biodataupdateadmin/{id_biodata}/pengalamanadmin/{id}/insertpengalamanadmin', [BiodataController::class, 'insertpengalamanadmin']);
    //PDF
    Route::get('/biodataupdateadmin/{id_biodata}/pdfadmin', [BiodataController::class, 'cetak_pdfadmin']);

    //Lowongan
    Route::resource('/lowongan', LowonganController::class);
    Route::get('/data/divisi', [LowonganController::class, 'getdivisi'])->name('getdivisi');
    Route::get('/data/divisifirst/{id_divisi}', [LowonganController::class, 'getdivisifirst'])->name('getdivisifirst');

    //Divisi
    Route::resource('/divisi', DivisiController::class);

    //Apply
    Route::resource('/apply', ApplyController::class);
});

Route::group(['middleware' => ['auth', 'hakakses:2']], function () {
//Tampil
Route::get('/biodata', [BiodataController::class, 'tampilbiodata'])->name('biodata');
Route::get('/biodataupdate', [BiodataController::class, 'tampilbiodataupdate'])->name('biodataupdate');
Route::get('/pendidikan', [BiodataController::class, 'tampilpendidikan'])->name('pendidikan');
Route::get('/pelatihan', [BiodataController::class, 'tampilpelatihan'])->name('pelatihan');
Route::get('/pengalaman', [BiodataController::class, 'tampilpengalaman'])->name('pengalaman');
//Insert Form
Route::get('/biodata/pendidikan', [BiodataController::class, 'pendidikan']);
Route::get('/biodata/pelatihan', [BiodataController::class, 'pelatihan']);
Route::get('/biodata/pengalaman', [BiodataController::class, 'pengalaman']);
Route::get('/biodata/tambah', [BiodataController::class, 'tambah']);
//Insert Method
Route::post('/biodata/insertbiodata', [BiodataController::class, 'insertbiodata']);
Route::post('/biodata/insertpendidikan', [BiodataController::class, 'insertpendidikan']);
Route::post('/biodata/insertpelatihan', [BiodataController::class, 'insertpelatihan']);
Route::post('/biodata/insertpengalaman', [BiodataController::class, 'insertpengalaman']);
//Update Form
Route::get('/biodata/updatebiodataform/{id_biodata}', [BiodataController::class, 'updatebiodataform']);
Route::get('/biodata/updatependidikanform/{id_pendidikan}', [BiodataController::class, 'updatependidikanform']);
Route::get('/biodata/updatepelatihanform/{id_pelatihan}', [BiodataController::class, 'updatepelatihanform']);
Route::get('/biodata/updatepengalamanform/{id_pengalaman}', [BiodataController::class, 'updatepengalamanform']);
//Update Method
Route::post('/biodata/updatebiodata/{id_biodata}', [BiodataController::class, 'updatebiodata']);
Route::post('/biodata/updatepelatihan/{id_pelatihan}', [BiodataController::class, 'updatepelatihan']);
Route::post('/biodata/updatependidikan/{id_pendidikan}', [BiodataController::class, 'updatependidikan']);
Route::post('/biodata/updatepengalaman/{id_pengalaman}', [BiodataController::class, 'updatepengalaman']);
//Delete Method
Route::get('/biodata/deletebiodata/{id_biodata}', [BiodataController::class, 'deletebiodata']);
Route::get('/biodata/deletependidikan/{id_pendidikan}', [BiodataController::class, 'deletependidikan']);
Route::get('/biodata/deletepelatihan/{id_pelatihan}', [BiodataController::class, 'deletepelatihan']);
Route::get('/biodata/deletepengalaman/{id_pengalaman}', [BiodataController::class, 'deletepengalaman']);

Route::get('/cekdaftar', [BiodataController::class, 'cekdaftar'])->name('cekdaftar');
Route::get('/pdf', [BiodataController::class, 'cetak_pdf']);

//Lowongan
Route::resource('/loker', LokerController::class);
Route::get('/data/lokerdivisi', [LokerController::class, 'getdivisi'])->name('getdivisi');
Route::get('/data/lokerdivisifirst/{id_divisi}', [LokerController::class, 'getdivisifirst'])->name('getdivisifirst');
Route::get('/data/lokerbiodata', [LokerCOntroller::class, 'getbiodatafirst']);

//Apply
Route::resource('/apply', ApplyController::class);
Route::resource('/riwayat_daftar', Riwayat_DaftarController::class);
});