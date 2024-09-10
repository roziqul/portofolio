@extends('master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Manajemen Buku</div>
                <div class="breadcrumb-item">Katalog</div>
                <div class="breadcrumb-item">Tambah Buku</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h2>Buku Umum</h2>
                            <p class="lead">
                                Digunakan untuk melakukan inserting buku yang sama dalam jumlah banyak.
                            </p>
                            <a href="#" class="btn btn-primary mt-4">Mulai</a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h2>Buku Spesifik</h2>
                            <p class="lead">
                                Digunakan untuk melakukan inserting buku yang hanya ada satu.
                            </p>
                            <a href="{{route('buku.katalog.single')}}" class="btn btn-primary mt-4">Mulai</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection