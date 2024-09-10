@extends('Public.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Seleksi Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">NISN</th>
                            <th style="text-align: center;">Nama Siswa</th>
                            <th style="text-align: center;">Asal Sekolah</th>
                            <th style="text-align: center;">Poin</th>
                            <th style="text-align: center;">Status Akademik</th>
                            <th style="text-align: center;">Status Keuangan</th>
                            <th style="text-align: center;">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar as $d)
                        <tr>
                            {{-- NISN --}}
                            <td style="text-align: center;">{{$d->Siswa->nisn}}</td>
                            {{-- NAMA --}}
                            <td style="text-align: center;">{{$d->Siswa->nama}}</td>
                            {{-- ASAL SEKOLAH --}}
                            <td style="text-align: center;">{{$d->Siswa->schorigin}}</td>
                            {{-- POIN --}}
                            @if ($d->point == null)
                                <td style="text-align: center;">-</td>
                            @else
                                <td style="text-align: center;">{{$d->point}}</td>
                            @endif
                            {{-- STATUS AKADEMIK --}}
                            @if ($d->status != 'VERIFIED' && $d->point != null)
                                <td style="text-align: center;">MENUNGGU VERIFIKASI</td>
                            @elseif ($d->status == 'VERIFIED')
                                @foreach ($seleksi as $s)
                                <td style="text-align: center;">{{$s->status}}</td>
                                @endforeach
                            @elseif($d->status != 'VERIFIED' && $d->point == null)
                                <td style="text-align: center;">-</td>
                            @endif
                            {{-- STATUS KEUANGAN --}}
                            @if ($d->status != 'VERIFIED' && $d->point != null)
                                <td style="text-align: center;">MENUNGGU VERIFIKASI</td>
                            @elseif ($d->status == 'VERIFIED')
                                @foreach ($seleksi as $s)
                                    @if ($s->status == 'TIDAK LOLOS')
                                    <td style="text-align: center;">-</td>
                                    @else
                                    @endif
                                @endforeach
                            @elseif($d->status != 'VERIFIED' && $d->point == null)
                                <td style="text-align: center;">-</td>
                            @endif
                            @foreach ($seleksi as $s)
                                @if ($s->status == 'LOLOS')
                                    @foreach ($spp as $p)
                                        @if ($p->status == 'NOT VERIFIED')
                                        <td style="text-align: center;">
                                            <a href="#" class="btn btn-danger">
                                                <span class="text">BELUM LUNAS</span>
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('get.seleksi.daftar-ulang')}}" class="btn btn-success">
                                                <span class="text">DAFTAR ULANG</span>
                                            </a>
                                        </td>
                                        @elseif ($p->status == 'WAITING VERIFICATION')
                                        <td style="text-align: center;">
                                            <a href="#" class="btn btn-warning">
                                                <span class="text">WAITING VERIFICATION</span>
                                            </a>
                                        </td>
                                        <td style="text-align: center;">-</td> 
                                        @elseif ($p->status == 'VERIFIED')
                                        <td style="text-align: center;">
                                            <a href="#" class="btn btn-success">
                                                <span class="text">VERIFIED</span>
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('get.bukti-penerimaan')}}" class="btn btn-success">
                                                <span class="text">Cetak Bukti Penerimaan</span>
                                            </a>
                                        </td>
                                        @endif
                                    @endforeach
                                @else
                                    <td style="text-align: center;">-</td> 
                                @endif
                            @endforeach

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection