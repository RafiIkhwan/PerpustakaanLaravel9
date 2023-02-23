
{{-- Tambah petugas --}}
<div class="absolute">
    <div class="modal fade" id="petugasTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Label">Tambah Data Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('petugasStore') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namapetugas">Nama Petugas</label>
                            <input class="form-control" type="text" name="namapetugas" id="namapetugas" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="hp">Hp</label>
                            <input class="form-control" type="text" name="hp" id="hp" required>
                        </div>
                        <div class="form-group">
                            <label class="mt-2" for="role">Role</label>
                            <input class="form-control" type="text" name="role" id="role" required><br>
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

{{-- Edit petugas --}}
<div class="absolute">
    <div class="modal fade" id="petugasEdit-{{ Auth::id() == $admin->idpetugas }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="Label">Edit Data | <i class="text-dark">@</i<i class="text-dark">{{ Auth::user()->email }}</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/petugas/update/{{ $admin->idpetugas }}" method="post" autocomplete="off">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="namapetugas">Nama Petugas</label>
                        <input class="form-control" type="text" name="namapetugas" id="namapetugas" value="{{ $admin->namapetugas }}">
                        <label class="mt-2" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ $admin->email }}">
                        <label class="mt-2" for="hp">Hp</label>
                        <input class="form-control" type="text" name="hp" id="hp" value="{{ $admin->hp }}">
                        <label class="mt-2" for="oldpassword">Confirm Password</label>
                        <input class="form-control" type="password" name="oldpassword" id="oldpassword"">
                        <label class="mt-2" for="newpassword">New Password</label>
                        <input class="form-control" type="password" name="newpassword" id="newpassword"><br>
                        <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                        @if ($admin->created_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $admin->created_at }}</span><br>
                        @endif
                        @if ($admin->updated_at != NULL)
                        <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $admin->updated_at }}</span>
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


<div class="absolute">
    <div class="modal fade" id="petugasConfirm-{{ $admin->idpetugas }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="Label">Hapus Data | <i class="text-dark">@</i<i class="text-dark">{{ Auth::user()->email }}</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/petugas/hapus/{{ $admin->idpetugas }}" method="get" id="toggle-modal" autocomplete="off">
                @csrf
                <input type="text" disabled hidden name="idpetugas" value="{{ $admin->idpetugas }}" id="idpetugas">
                <div class="modal-body">
                    <p class="text-black-50">Nama Petugas : <b>{{ $admin->namapetugas }}</b></p>
                    <p class="text-black-50">Email : <b>{{ $admin->email }}</b></p>
                    <p class="text-black-50">Hp : <b>{{ $admin->hp }}</b></p>
                    <p class="text-black-50">Role : <b>{{ $admin->role }}</b></p>
                    <span class="text-black-50"><span class="text-dark">Waktu     :</span> {{ $date }}</span><br>
                    @if ($admin->created_at != NULL)
                    <span class="text-black-50"><span class="text-dark">Di buat   :</span> {{ $admin->created_at }}</span><br>
                    @endif
                    @if ($admin->updated_at != NULL)
                    <span class="text-black-50"><span class="text-dark">Di edit   :</span> {{ $admin->updated_at }}</span>
                    @endif
                    <br><br>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Error : </b> {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input class="form-control" type="password" name="password" id="passowrd" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
