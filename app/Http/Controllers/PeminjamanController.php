<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Petugas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    
    public function index()
    {
        $table_peminjaman = Peminjaman::paginate(5);
        $tbl_petugas = Petugas::all();
        $tbl_buku    = Buku::all();
        $tbl_siswa   = Siswa::all();
        $date = date("d M Y - H:m");

        return view('admin.peminjaman.peminjaman', [
            'datas' => $table_peminjaman,
            'admins'=> $tbl_petugas,
            'books' => $tbl_buku,
            'siswas'=> $tbl_siswa,
            'date'  => $date, 
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'idbuku'       => ['required'],
            'idsiswa'      => ['required'],
            'idpetugas'    => ['required'],
        ]);

        Peminjaman::create([
            'idbuku'        => $request->idbuku,
            'idsiswa'       => $request->idsiswa,
            'idpetugas'     => $request->idpetugas,
            'created_at'    => Carbon::now(),
            'updated_at'    => null
        ]);

        return redirect()->back()->with('success', 'Data Peminjaman berhasil ditambahkan !');
    }

    public function update($idpeminjaman,Request $request)
    {
        $this->validate($request,[
            'idbuku'      => ['required'],
            'idsiswa'     => ['required'],
            'idpetugas'   => ['required'],
        ]);

        $peminjaman = Peminjaman::find($idpeminjaman);
        $peminjaman->idbuku     =$request->idbuku;
        $peminjaman->idsiswa    =$request->idsiswa;
        $peminjaman->idpetugas  =$request->idpetugas;

        $peminjaman->save();
        
        return redirect()->back()->with('edit', 'Data Peminjaman berhasil diedit !');
    }

    public function kembali($idpeminjaman)
    {
        $tbl_peminjaman = Peminjaman::find($idpeminjaman);
        $tbl_peminjaman->delete();

        return redirect()->back()->with('kembali', 'Berhasil Mengembalikan barang !');
    }

    public function pengembalian()
    {
        $tbl_peminjaman = Peminjaman::onlyTrashed()->get();
        $tbl_petugas = Petugas::all();
        $date = date("d M Y - H:m");

        return view('admin.peminjaman.pengembalian', ['datas' => $tbl_peminjaman, 'admins' => $tbl_petugas, 'date' => $date]);
    }
    public function delete($idpeminjaman)
    {
        $tbl_peminjaman = Peminjaman::onlyTrashed()->where('idpinjam',$idpeminjaman);
        $tbl_peminjaman->forceDelete();

        return redirect()->back()->with('hapus', 'Data Pengembalian Berhasil di Hapus');
    }
}
