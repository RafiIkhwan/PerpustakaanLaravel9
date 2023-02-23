
{{-- Tambah siswa --}}
<div class="absolute">
    <div class="modal fade" id="siswaTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('siswaStore') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nis">Kode siswa</label>
                            <input class="form-control" type="text" name="nis" id="nis" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="namasiswa">namasiswa</label>
                            <input class="form-control" type="text" name="namasiswa" id="namasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="kelas">kelas</label>
                            <input class="form-control" type="text" name="kelas" id="kelas" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="hp">hp</label>
                            <input class="form-control" type="text" name="hp" id="hp" required><br>
                        </div>
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



{{-- Edit siswa --}}
@foreach ($siswas as $siswa)    
<div class="absolute">
    <div class="modal fade" id="siswaEdit-{{ $siswa->idsiswa }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="Label">Edit Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/siswa/update/{{ $siswa->idsiswa }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="nis">Kode siswa</label>
                        <input class="form-control" type="text" name="nis" id="nis" value="{{ $siswa->nis }}">
                        <label class="mt-2" for="namasiswa">Nama Siswa</label>
                        <input class="form-control" type="text" name="namasiswa" id="namasiswa" value="{{ $siswa->namasiswa }}">
                        <label class="mt-2" for="kelas">Kelas</label>
                        <input class="form-control" type="text" name="kelas" id="kelas" value="{{ $siswa->kelas }}">
                        <label class="mt-2" for="hp">Hp</label>
                        <input class="form-control" type="text" name="hp" id="hp" value="{{ $siswa->hp }}"><br>
                        <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                        @if ($siswa->created_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $siswa->created_at }}</span><br>
                        @endif
                        @if ($siswa->updated_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $siswa->updated_at }}</span>
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


@foreach ($siswas as $siswa)    
<div class="absolute">
<div class="modal fade" id="siswaHapus-{{ $siswa->idsiswa }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="Label">Yakin ingin menghapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-black-50">NIS : <b>{{ $siswa->nis }}</b></p>
                <p class="text-black-50">Nama siswa : <b>{{ $siswa->namasiswa }}</b></p>
                <p class="text-black-50">Kelas : <b>{{ $siswa->kelas }}</b></p>
                <p class="text-black-50">Hp : <b>{{ $siswa->hp }}</b></p>
                <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                @if ($siswa->created_at != NULL)
                <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $siswa->created_at }}</span><br>
                @endif
                @if ($siswa->updated_at != NULL)
                <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $siswa->updated_at }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" href="/siswa/delete/{{ $siswa->idsiswa }}">Yakin</a>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach