<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Petugas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{

    public function index()
    {
        $table_admin = Petugas::all();
        $date = date("d M Y - H:m");

        return view('admin.profile', [
            'admins' => $table_admin,
            'date'  => $date,
        ]);
    }

    public function store(Request $request)
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

        return redirect()->back()->with('success', 'Data Petugas berhasil ditambahkan !');
    }

    public function update($idpetugas,Request $request)
    {
        $this->validate($request,[
            'namapetugas'   => ['required'],
            'email'         => ['required'],
            'hp'            => ['required'],
            'oldpassword'   => ['required'],
            'newpassword'   => ['required'],
        ]);

        $data = [
            'idpetugas'     => $idpetugas,
            'password'      => $request->oldpassword,
        ];

        if(Auth::attempt($data)){
            $admin = Petugas::find($idpetugas);
            $admin->namapetugas =$request->namapetugas;
            $admin->email       =$request->email;
            $admin->hp          =$request->hp;
            $admin->password    = Hash::make($request->newpassword);
    
            $admin->save();
            
            return redirect()->back()->with('edit', 'Data Petugas berhasil diedit !');
        }
        else{
            return redirect()->back()->with('error', 'Password salah !');
        }

    }

    public function delete($idpetugas)
    {
        $peminjaman = Peminjaman::where('idpetugas',$idpetugas);
        $peminjaman->forcedelete();

        if($peminjaman->count() == 0){
            $petugas = Petugas::find($idpetugas);
            $petugas->delete();
            Auth::logout();


            Session::flash('success', 'Akun Berhasil dihapus');
            
            return redirect('/');
        }
        else{
            Session::flash('error', 'Terjadi Kesalahan.');
            return redirect('petugas');
        }
    }
}
