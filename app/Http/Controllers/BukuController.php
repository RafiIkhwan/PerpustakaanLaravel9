<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Petugas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index()
    {
        $tbl_petugas    = Petugas::all();
        $table_buku = Buku::paginate(5);
        $date = date("H:i:s D, j/m/Y");

        return view('admin.buku.buku', [
            'books'  => $table_buku,
            'admins' => $tbl_petugas, 
            'date'   => $date ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kodebuku'  => ['required', 'max:10'],
            'judul'     => ['required'],
            'pengarang' => ['required'],
            'penerbit'  => ['required'],
        ]);

        Buku::create([
            'kodebuku'  => $request->kodebuku,
            'judul'     => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit'  => $request->penerbit,
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

        return redirect()->back()->with('success', 'Data buku berhasil ditambahkan !');
    }

    public function update($idbuku,Request $request)
    {
        $this->validate($request,[
            'kodebuku'  => ['required', 'max:10'],
            'judul'     => ['required'],
            'pengarang' => ['required'],
            'penerbit'  => ['required'],
        ]);

        $buku = Buku::find($idbuku);
        $buku->kodebuku =$request->kodebuku;
        $buku->judul    =$request->judul;
        $buku->pengarang=$request->pengarang;
        $buku->penerbit =$request->penerbit;

        $buku->save();
        
        return redirect()->back()->with('edit', 'Data Buku berhasil diedit !');
    }

    public function delete($idbuku)
    {
        $tbl_buku = Buku::find($idbuku);
        $tbl_buku->delete();

        return redirect()->back();
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

    
        $tbl_petugas = Petugas::all();
        $table_buku = DB::table('tbl_buku')->where('judul','like',"%".$cari."%")->paginate();
        $date = date("d M Y - H:m");

        return view('admin.buku.buku', [
            'admins' => $tbl_petugas,
            'books' => $table_buku,
            'date'  => $date,
        ]);
    }
}
