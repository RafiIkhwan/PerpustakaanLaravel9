
{{-- Tambah peminjaman --}}
<div class="absolute">
    <div class="modal fade" id="peminjamanTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('peminjamanStore') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="idbuku">Judul Buku</label>
                            <select class="form-control" type="text" name="idbuku" id="idbuku" required>
                                <option @disabled(true)>Pilih Judul</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->idbuku }}">{{ $book->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="idsiswa">Nama Peminjam</label>
                            <select class="form-control" type="text" name="idsiswa" id="idsiswa" required>
                                <option @disabled(true)>Pilih Peminjam</option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->idsiswa }}">{{ $siswa->namasiswa }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-none">
                            @foreach($admins as $admin)
                                @if(Auth::id() == $admin->idpetugas)
                                    <label class="mt-2" for="idpetugas">Nama Petugas</label>                                  
                                    <input class="form-control" type="text" name="idpetugas" id="idpetugas" value="{{ $admin->idpetugas }}">
                                @endif
                            @endforeach
                        </div>
                        <br>
                        <span class="text-black-50"><span class="text-dark">Waktu :</span> {{ $date }}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Edit peminjaman --}}
@foreach ($datas as $data)    
    <div class="absolute">
        <div class="modal fade" id="peminjamanEdit-{{ $data->idpinjam }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="Label">Edit Data Peminjaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/peminjaman/update/{{ $data->idpinjam }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="idbuku">Judul Buku</label>
                                <select class="form-control" type="text" name="idbuku" id="idbuku" required>
                                    <option class="text-black-50">{{ $data->buku->judul }}</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->idbuku }}">{{ $book->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="mt-2" for="idsiswa">Nama Peminjam</label>
                                <select class="form-control" type="text" name="idsiswa" id="idsiswa" required>
                                    <option class="text-black-50">{{ $data->siswa->namasiswa }}</option>
                                    @foreach ($siswas as $siswa)
                                        <option value="{{ $siswa->idsiswa }}">{{ $siswa->namasiswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-none">
                                @foreach($admins as $admin)
                                    @if(Auth::id() == $admin->idpetugas)
                                        <label class="mt-2" for="idpetugas">Nama Petugas</label>                                  
                                        <input class="form-control" type="text" name="idpetugas" id="idpetugas" value="{{ $admin->idpetugas }}">
                                    @endif
                                @endforeach
                            </div>
                            <br><br>
                            <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                            @if ($data->created_at != NULL)
                            <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $data->created_at }}</span><br>
                            @endif
                            @if ($data->updated_at != NULL)
                            <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $data->updated_at }}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
@foreach ($datas as $data)    
<div class="absolute">
    <div class="modal fade" id="peminjamanHapus-{{ $data->idpinjam }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="Label">Konfirmasi Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-black-50">Kode Peminjaman : <b>{{ $data->idpinjam }}</b></p>
                    <p class="text-black-50">Judul Buku : <b>{{ $data->buku->judul }}</b></p>
                    <p class="text-black-50">Nama Peminjam : <b>{{ $data->siswa->namasiswa }}</b></p>
                    <p class="text-black-50">Nama Petugas : <b>{{ $data->petugas->namapetugas }}</b></p>
                    <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                    @if ($data->created_at != NULL)
                    <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $data->created_at }}</span><br>
                    @endif
                    @if ($data->updated_at != NULL)
                    <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $data->updated_at }}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a class="btn btn-success" href="/peminjaman/kembali/{{ $data->idpinjam }}">Yakin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
