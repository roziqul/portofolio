@extends('master')

@section('content')

    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
        <section class="section">
            <div class="section-header">
                <h1>SmartLib V1 - Admin Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Buku Dipinjam</h4>
                            </div>
                            <div class="card-body">
                                {{ $countReserved }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kategori Buku</h4>
                            </div>
                            <div class="card-body">
                                {{ $countCategory }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Pengguna</h4>
                            </div>
                            <div class="card-body">
                                {{ $countUser }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Tagihan</h4>
                            </div>
                            <div class="card-body">
                                @if ($countFine < 1000000)
                                    Rp. {{ $countFine }}
                                @else
                                    <h6>
                                        Rp. {{ $countFine }}
                                    </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Kehilangan</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Nomor Seri</th>
                                            <th>Peminjam</th>
                                            <th style="text-align: center">Tanggal Pengajuan Kehilangan</th>
                                            <th style="text-align: center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($waitingApproval as $val)
                                            <tr>
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td style="text-align: center">
                                                    <a href="#"
                                                        class="font-weight-600">{{ $val->catalog->serial_number }}</a>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                        class="font-weight-600">{{ $val->catalog->student->fullname }}</a>
                                                </td>
                                                <td style="text-align: center">{{ $val->created_at }}</td>
                                                <td style="text-align: center">
                                                    <a href="#" class="btn btn-icon icon-left btn-primary">
                                                        <i class="fa fa-search"></i>
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Tagihan Siswa</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">Nomor Seri</th>
                                        <th>Peminjam</th>
                                        <th>Keterangan</th>
                                        <th style="text-align: center">Tagihan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Menu</th>
                                    </tr>
                                    @foreach ($waitingPayments as $val)
                                        <tr>
                                            <td style="text-align: center">{{ $no++ }}</td>
                                            <td style="text-align: center">
                                                <a href="#"
                                                    class="font-weight-600">{{ $val->catalog->serial_number }}</a>
                                            </td>
                                            <td>
                                                <a href="#" class="font-weight-600">{{ $val->student->fullname }}</a>
                                            </td>
                                            <td>
                                                <div class="font-weight-600">Kehilangan</div>
                                            </td>
                                            <td style="text-align: right">Rp. {{ $val->fines }}</td>
                                            <td style="text-align: center">
                                                <div class="badge badge-danger">Belum Dibayar</div>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="#" class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif (auth()->user()->role == 'student')
        <section class="section">
            <div class="section-header text-primary" style="background-color: white;">
                <h1>Smart Library System - Ottalabs High School</h1>
            </div>
            <div class="section-body">

            </div>
        </section>
    @endif

@endsection
