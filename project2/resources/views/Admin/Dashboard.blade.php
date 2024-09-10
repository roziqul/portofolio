@extends('Admin.Master')
@section('Content')
<div class="card-header">
    <h3 class="card-title">Selamat Datang di Website Admisi Penerimaan Siswa Baru SMP Unggulan Noval</h3>
    <h5>Jl. Sudancho Supriadi 149 Kota Blitar</h5>
    <h5>Jumlah Pengguna : {{$user}}</h5>
    <h5>Pendataan Menunggu Verifikasi : {{$siswa}}</h5>
    <h5>Pendaftaran Seleksi Menunggu Verifikasi : {{$daftar}}</h5>
</div>    
@endsection