<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Petugas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        $date = date("d M Y - H:m");

        if(Auth::check()){
            return redirect('home')->with('success', 'Selamat Datang Kembali !');
        }
        else{
            return view('login', [
                'date'  => $date,
        ]);
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if(Auth::attempt($data)){
            return redirect('home')->with('success', 'Berhasil Login !');
        }
        else{
            Session::flash('error', 'Email atau Password Salah !');
            return redirect('/');
        }
    }


    public function loginStore(Request $request)
    {
        $this->validate($request,[
            'namapetugas'   => ['required'],
            'email'         => ['required'],
            'password'      => ['required'],
            'hp'            => ['required'],
            'role'          => ['required'],
        ]);

        Petugas::create([
            'namapetugas'   => $request->namapetugas,
            'email'         => $request->email,
            'hp'            => $request->hp,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
            'created_at'    => Carbon::now(),
            'updated_at'    => null
        ]);

        $data = [
            'namapetugas'   => $request->input('namapetugas'),
            'email'         => $request->input('email'),
            'hp'            => $request->input('hp'),
            'password'      => $request->input('password'),
            'role'          => $request->input('role'),
            'created_at'    => Carbon::now(),
            'updated_at'    => null
        ];

        if(Auth::attempt($data)){
            return redirect('home')->with('success', 'Register berhasil !, silahkan login');
        }
        else{
            Session::flash('error', 'Data tidak valid, atau sudah ada, coba buat baru');
            return redirect('/');
        }
    }


    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}
