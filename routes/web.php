<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

// Middleware Routh
Route::group(['middleware' => 'web'], function () {

   Route::get('/', [LoginController::class, 'login'])->name('login');
   Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
   Route::post('loginstore', [LoginController::class, 'loginStore'])->name('loginStore');


   // Auth
   Route::middleware('auth')->group(function(){

      Route::get('home', [HomepageController::class, 'index'])->name('home');
      Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi');


      
      // Route CRUD Buku

      // Add (Create)
      Route::post('/buku/store', [BukuController::class, 'store'])->name('bukuStore');

      // Table View (Read)
      Route::get('/buku', [BukuController::class, 'index'])->name('buku');

      // Edit (Update)
      Route::put('/buku/update/{idbuku}', [BukuController::class, 'update'])->name('bukuUpdate');

      // Delete View (Delete)
      Route::get('/buku/delete/{idbuku}', [BukuController::class, 'delete'])->name('bukuDelete');

      // Pencarian buku
      Route::get('/buku/cari', [BukuController::class, 'cari'])->name('bukuCari');


      
      // Route CRUD Petugas

      // Add (Create)
      Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugasStore');

      // Table View (Read)
      Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');

      // Edit (Update)
      Route::put('/petugas/update/{idpetugas}', [PetugasController::class, 'update'])->name('petugasUpdate');

      // Delete View (Delete)
      Route::get('/petugas/delete/{idpetugas}', [PetugasController::class, 'delete'])->name('petugasDelete');

      // Pencarian Petugas
      Route::get('/petugas/cari', [PetugasController::class, 'cari'])->name('petugasCari');

      

      // Route CRUD Siswa

      // Add (Create)
      Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswaStore');

      // Table View (Read)
      Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');

      // Edit (Update)
      Route::put('/siswa/update/{idsiswa}', [SiswaController::class, 'update'])->name('siswaUpdate');

      // Delete View (Delete)
      Route::get('/siswa/delete/{idsiswa}', [SiswaController::class, 'delete'])->name('siswaDelete');

      // Pencarian Siswa
      Route::get('/siswa/cari', [SiswaController::class, 'cari'])->name('siswaCari');



      // Route CRUD Peminjaman

      // Add (Create)
      Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjamanStore');

      // Table View (Read)
      Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');

      // Edit (Update)
      Route::put('/peminjaman/update/{idpeminjaman}', [PeminjamanController::class, 'update'])->name('peminjamanUpdate');

      // kembali View 
      Route::get('/peminjaman/kembali/{idpeminjaman}', [PeminjamanController::class, 'kembali'])->name('peminjamanKembali');

      // kembali View 
      Route::get('/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('pengembalian');

      // Delete
      Route::get('/peminjaman/delete/{idpeminjaman}', [PeminjamanController::class, 'delete'])->name('peminjamanDelete');


      



















   });
});















// Route::get('test' , function ()
// {
//    return view("test"); 
// });
