@extends('admin.index')

@section('title', 'Buku')

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
            <span class="d-flex h2">Tabel Buku</span>
            <div class="d-flex">
                <button data-bs-toggle="modal" data-bs-target="#bukuTambah" class="btn btn-primary py-2" >Tambah Data Buku</button>
            </div>
        </div>
        <br>
        <div class="d-flex py-3 w-100 border-top">
            <form action="/buku/cari" method="get" class="d-flex w-100">
                <input class="form-control" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="">
                    <th>ID</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th class="text-center">Aksi</th>
                </thead>
                @foreach ($books as $book)
                <tbody class="">
                    <th scope="row" class="p-3">{{ $book->idbuku }}</th>
                    <td class="p-3">{{ $book->kodebuku }}</td>
                    <td class="p-3">{{ $book->judul }}</td>
                    <td class="p-3">{{ $book->pengarang }}</td>
                    <td class="p-3">{{ $book->penerbit }}</td>
                    <td class="text-center">
                        <a class="btn text-light btn-warning m-1" data-bs-toggle="modal" data-bs-target="#bukuEdit-{{ $book->idbuku }}" href=''>Edit</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bukuHapus-{{ $book->idbuku }}" href=''>Hapus</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
        {{ $books->links() }}
    </div>

    @include('admin.buku.bkModal')
@endsection