@extends('admin.index')

@section('title', 'Dashboard')

@section('konten')

<span>
@if (session()->has('success'))
    <div class="alert alert-info position-relative">
        {{ session('success') }}
    </div>
@endif
</span>


<h1>Sejarah Perpustakaan</h1>
<p>Perpustakaan telah ada sejak zaman kuno. Pada awalnya, perpustakaan didirikan untuk menyimpan naskah dan dokumen penting. Salah satu perpustakaan tertua yang diketahui adalah Perpustakaan Ashurbanipal di Mesopotamia, yang dibangun pada abad ke-7 SM.</p>
<p>Pada masa Yunani Kuno, perpustakaan juga menjadi sangat penting. Perpustakaan yang terkenal di Yunani adalah Perpustakaan Alexandria, yang didirikan pada abad ke-3 SM. Perpustakaan ini menjadi pusat kebudayaan dan pendidikan pada masanya.</p>
<p>Pada abad pertengahan, perpustakaan terutama dimiliki oleh gereja dan institusi keagamaan. Pada abad ke-15, Johannes Gutenberg menemukan mesin cetak yang revolusioner, yang memungkinkan untuk mencetak buku dalam jumlah besar. Hal ini membuat buku menjadi lebih terjangkau dan mudah didapatkan, dan perpustakaan menjadi semakin populer.</p>
<p>Saat ini, perpustakaan masih merupakan tempat yang penting untuk menyimpan, mencari, dan memperoleh informasi. Perpustakaan modern memiliki koleksi buku, majalah, jurnal, dan dokumen digital yang sangat luas. Selain itu, perpustakaan juga menjadi pusat kegiatan sosial, seperti diskusi buku, acara baca dan cerita, serta berbagai kegiatan pendidikan lainnya.</p>

@endsection