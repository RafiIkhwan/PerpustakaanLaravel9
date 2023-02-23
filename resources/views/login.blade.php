<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Perpustakaan | Login</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="icon" href="{{ asset('image/favicon.ico') }}">
    </head>

    <body>
        <div class="w-50 border shadow rounded mt-5 m-auto px-5">
            <div class="col-md-10 col-md-offset-10 m-auto py-4">
                <div class="text-center mb-3">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo SMK 1 Cimahi" class="img-fluid border-none" style="max-width:40%;">                        
                </div>
                <h2 class="text-center">Perpustakaan Sekolah</h2><br>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Error : </b> {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('loginaksi') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group mt-1">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block px-3">Log In</button>
                    <hr>
                    <p class="text-center" >Belum punya akun? <a href="" data-bs-toggle="modal" data-bs-target="#loginTambah" >Register</a> sekarang!</p>
                                        
                </form>
            </div>
        </div>
        {{-- Tambah login --}}
        <div class="absolute">
            <div class="modal fade" id="loginTambah" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="Label">Register</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('loginStore') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="namapetugas">Nama</label>
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
        <script src="{{ asset('assets/js/bootstrap.js') }}">"></script>
    </body>
</html>