<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Perpustakaan | @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
        <link rel="icon" href="{{ asset('image/favicon.ico') }}">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
        <style>
            .table-responsive{
                scroll-behavior: smooth;
            }
        </style>
    </head>

    <body class="d-flex flex-column min-vh-100">
        @foreach ($admins as $admin)    
        @if(Auth::id() == $admin->idpetugas)
        <div class="container">
            <div class="col-md-12">
                <div class="position-fixed container" style="margin-left: -10px; margin-top: -10px;"> 
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid py-2 px-4 shadow-sm rounded border bg-body">
                            <a class="navbar-brand" href="{{ route('home') }}"><b>Perpustakaan</b></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse mt-1" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('buku') ? 'text-dark' : '' }}" aria-current="page" href="{{ route('buku') }}">Buku</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('petugas') ? 'text-dark' : '' }}" href="{{ route('petugas') }}">Petugas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('siswa') ? 'text-dark' : '' }}" href="{{ route('siswa') }}">Siswa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-body {{ request()->is('peminjaman') ? 'text-dark' : '' }}" href="{{ route('peminjaman') }}">Peminjaman</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#petugasEdit-{{ Auth::id() == $admin->idpetugas }}" class="btn btn-primary py-2" ><i class="fa-regular fa-user"></i> Edit Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logoutaksi') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <br><br><br><br>

                @yield('konten')

                <br>
                <br>
            </div>
        </div>

        @include('admin.modalProfile')
@endif
@endforeach

        <footer class="container rounded bg-body shadow p-3 mt-auto border text-center">
            <h4>Copyright @2022 Rafi Ikhwan</h4>
        </footer>
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    </body>
</html>