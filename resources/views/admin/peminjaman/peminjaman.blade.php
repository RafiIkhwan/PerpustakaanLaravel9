@extends('admin.index')

@section('title', 'Peminjaman')

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

@if (session()->has('kembali'))
    <div class="alert alert-success position-static">
        {{ session('kembali') }}
    </div>
@endif

    <div class="m-auto shadow px-3 pt-3 rounded border">
        <div class="d-flex justify-content-between">
            <span class="d-flex h2">Tabel Peminjaman</span>
            <div class="d-flex">
                <button data-bs-toggle="modal" data-bs-target="#peminjamanTambah" class="btn btn-primary py-2" >Tambah Data Peminjaman</button>
            </div>
        </div>
        <br>
        <div class="d-flex py-3 w-100 border-top">
            <form action="" class="d-flex w-100">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="">
                    <th>ID</th>
                    <th>Nama Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Petugas</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th class="text-center">Aksi</th>
                </thead>
                @foreach ($datas as $data)
                <tbody class="">
                    <th scope="row" class="p-3">{{ $data->idpinjam }}</th>
                    <td class="p-3">{{ $data->buku->judul }}</td>
                    <td class="p-3">{{ $data->siswa->namasiswa }}</td>
                    <td class="p-3">{{ $data->petugas->namapetugas }}</td>
                    <td class="p-3">{{ $data->created_at }}</td>
                    <td class="p-3">{{ $data->updated_at }}</td>
                    <td class="text-center">
                        <a class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#peminjamanEdit-{{ $data->idpinjam }}" href=''>Edit</a>
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#peminjamanHapus-{{ $data->idpinjam }}" href=''>Kembali</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-between pb-4">
            {{ $datas->links() }}
            <a class="btn btn-success" href="{{ route('pengembalian') }}">Data Pengembalian</a>
        </div>
    </div>

    @include('admin.peminjaman.pnjmModal')
    
@endsection