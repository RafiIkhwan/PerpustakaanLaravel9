@extends('admin.index')

@section('title', 'Pengembalian')

@section('konten')

@if (session()->has('hapus'))
    <div class="alert alert-success position-static">
        {{ session('hapus') }}
    </div>
@endif

    <div class="m-auto shadow px-3 pt-3 rounded border">
        <div class="d-flex justify-content-between">
            <span class="d-flex h2">Tabel Pinjam Kembali</span>
            <div class="d-flex">            
                <a href="{{ route('peminjaman') }}" class="btn btn-secondary" style="line-height: 25px; height: 40px;">Kembali</a>
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
                    <th>Pengembalian</th>
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
                    <td class="p-3">{{ $data->deleted_at }}</td>
                    <td class="text-center">
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#peminjamanHapus-{{ $data->idpinjam }}" href=''>Hapus</a>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    
    @foreach ($datas as $data)    
    <div class="absolute">
        <div class="modal fade" id="peminjamanHapus-{{ $data->idpinjam }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="Label">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-black-50">Kode Peminjaman : <b>{{ $data->idpinjam }}</b></p>
                        <p class="text-black-50">Judul Buku : <b>{{ $data->buku->judul }}</b></p>
                        <p class="text-black-50">Nama Peminjam : <b>{{ $data->siswa->namasiswa }}</b></p>
                        <p class="text-black-50">Nama Petugas : <b>{{ $data->petugas->namapetugas }}</b></p>
                        <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                        @if ($data->deleted_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di Kembalikan   :</span> {{ $data->updated_at }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a class="btn btn-danger" href="/peminjaman/delete/{{ $data->idpinjam }}">Yakin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- @include('admin.peminjaman.pnjmModal') --}}
    
@endsection