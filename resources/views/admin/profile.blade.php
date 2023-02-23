@extends('admin.index')

@section('title', 'Petugas')

@section('konten')

@if (session()->has('success'))
    <div class="alert alert-info position-static">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-warning position-static">
        {{ session('edit') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger position-static">
        {{ session('error') }}
    </div>
@endif

    <div class="m-auto shadow px-3 pt-3 rounded border">
        <div class="d-flex justify-content-between">
            <span class="d-flex h2">Tabel Petugas</span>
            <div class="d-flex">
                <button data-bs-toggle="modal" data-bs-target="#petugasTambah" class="btn btn-primary py-2" >Tambah Data Petugas</button>
            </div>
        </div>
        <br>
        <div class="table-responsive border-top pt-2">
            <table class="table table-borderless">
                <thead class="">
                    <th>ID</th>
                    <th>Nama Petugas</th>
                    <th>Email</th>
                    <th>Hp</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="text-center">Aksi</th>
                </thead>
                @foreach ($admins as $admin)
                <tbody class="border {{ Auth::id() == $admin->idpetugas ? 'fw-bold' : '' }}">
                    <th scope="row" class="p-3">{{ $admin->idpetugas }}</th>
                    <td class="p-3">{{ $admin->namapetugas }}</td>
                    <td class="p-3">{{ $admin->email }}</td>
                    <td class="p-3">{{ $admin->hp }}</td>
                    <td class="p-3">{{ $admin->created_at }}</td>
                    <td class="p-3">{{ $admin->updated_at }}</td>
                    @if(Auth::id() == $admin->idpetugas)
                    <td class="text-center">
                        <a class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#petugasEdit-{{ Auth::id() == $admin->idpetugas }}" href=''>Edit</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#petugasConfirm-{{ $admin->idpetugas }}">Hapus</a>
                    </td>
                    @endif
                </tbody>
                @endforeach
            </table>
        </div>
        {{-- {{ $admins->links() }} --}}
    </div> 

@endsection