@extends('admin.index')

@section('title', 'Siswa')

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

    <div class="m-auto shadow px-3 pt-3 rounded border">
        <div class="d-flex justify-content-between">
            <span class="d-flex h2">Tabel Siswa</span>
            <div class="d-flex">
                <button data-bs-toggle="modal" data-bs-target="#siswaTambah" class="btn btn-primary py-2" >Tambah Data Siswa</button>
            </div>
        </div>
        <br>
        <div class="d-flex py-3 w-100 border-top">
            <form action="/siswa/cari" method="get" class="d-flex w-100">
                <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="">
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Hp</th>
                    <th class="text-center">Aksi</th>
                </thead>
                @foreach ($siswas as $siswa)
                <tbody class="">
                    <th scope="row" class="p-3">{{ $siswa->idsiswa }}</th>
                    <td class="p-3">{{ $siswa->nis }}</td>
                    <td class="p-3">{{ $siswa->namasiswa }}</td>
                    <td class="p-3">{{ $siswa->kelas }}</td>
                    <td class="p-3">{{ $siswa->hp }}</td>
                    <td class="text-center">
                        <a class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#siswaEdit-{{ $siswa->idsiswa }}" href=''>Edit</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#siswaHapus-{{ $siswa->idsiswa }}" href=''>Hapus</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
        {{ $siswas->links() }}
    </div>
    @include('admin.siswa.siswaModal')

@endsection