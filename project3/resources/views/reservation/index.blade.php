@extends('master')

@section('content')

    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
        <section class="section">
            <div class="section-header">
                <h1>Waiting List Peminjaman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="text-align:right">
                                    <a href="{{ route('admin-reserved-search-student') }}" class="btn btn-icon icon-left btn-primary" style="margin-bottom: 10px; width:100px;">
                                        <i class="fas fa-plus"></i>
                                        Insert
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No.</th>
                                                <th style="text-align: center">Nama Peminjam</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservation as $val)
                                                <tr>
                                                    <td style="text-align: center">{{ $no++ }}</td>
                                                    <td style="text-align: center">{{ $val->student->fullname }}</td>
                                                    <td style="text-align: center">
                                                        <div class="badge badge-warning">Menunggu Verifikasi</div>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <form action="{{ route('admin-reservation-show') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" id="id" value="{{ $val->student_id }}">
                                                            <button type="submit" class="btn btn-icon icon-left btn-primary">
                                                                <i class="fas fa-search"></i>
                                                                Detail
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif (auth()->user()->role == 'student')
        <section class="section">
            <div class="section-header">
                <h1>List Peminjaman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">Section</th>
                                                <th style="text-align: center">Kategori</th>
                                                <th style="text-align: center">Nomor Seri</th>
                                                <th style="text-align: center">Judul</th>
                                                <th style="text-align: center">Tanggal Dipinjam</th>
                                                <th style="text-align: center">Tempo Peminjaman</th>
                                                <th style="text-align: center">Jatuh Tempo</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reserved as $val)
                                                <tr>
                                                    <td style="text-align: center">
                                                        @if ($val->catalog)
                                                            {{ $val->catalog->section->name }}
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        @if ($val->catalog)
                                                            {{ $val->catalog->category->name }}
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        @if ($val->catalog)
                                                            {{ $val->catalog->serial_number }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($val->catalog)
                                                            {{ $val->catalog->title }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $val->loan_started }}</td>
                                                    <td>{{ $val->duration }}</td>
                                                    <td>{{ $val->loan_finished }}</td>
                                                    <td style="text-align: center"><a href="{{ route('catalog.index') }}"
                                                            class="btn btn-primary">Detail</a></td>
                                                </tr>
                                            @endforeach
                                            @foreach ($reservation as $val)
                                                <tr>
                                                    <td style="text-align: center">
                                                        {{ $val->section->name }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $val->category->name }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        -
                                                    </td>
                                                    <td>
                                                        {{ $val->title }}
                                                    </td>
                                                    <td>{{ $val->created_at }}</td>
                                                    <td>{{ $val->duration }} Bulan</td>
                                                    <td>-</td>
                                                    <td>
                                                        @if ($val->status == 'waiting')
                                                            <div class="badge badge-warning">Menunggu Konfirmasi</div>
                                                        @elseif ($val->status == 'not_approved')
                                                            <div class="badge badge-warning">Ditolak</div>
                                                        @endif

                                                    </td>
                                                    <td style="text-align: center"><a href="{{ route('catalog.index') }}"
                                                            class="btn btn-danger">Batalkan</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
