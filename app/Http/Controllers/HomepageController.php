<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $date           = date("d M Y - H:m");
        $tbl_petugas    = Petugas::all();

        return view('admin.home', [
            'date'      => $date,
            'admins'    => $tbl_petugas,
        ])->with('success', 'Data buku berhasil ditambahkan !');
    }
}
