@extends('Public.Master')
@section('Content')
<div class="container-fluid">
    @foreach ($fitur as $f)
        @if ($f->status == 'NON ACTIVE')
            <h3>HASIL SELEKSI PSB</h3>
            <h3>Maaf, untuk saat ini halaman sedang tidak tersedia</h3>
        @else
            <h1 class="h3 mb-2 text-gray-800">Hasil Perankingan</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Peringkat</th>
                                    <th style="text-align: center;">NISN</th>
                                    <th style="text-align: center;">Nama Siswa</th>
                                    <th style="text-align: center;">Asal Sekolah</th>
                                    <th style="text-align: center;">Poin</th>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($PASS as $val1)
                                <tr>
                                    <td style="text-align: center;">{{$rank++}}</td>
                                    <td style="text-align: center;">{{$val1->Siswa->nisn}}</td>
                                    <td style="text-align: center;">{{$val1->Siswa->nama}}</td>
                                    <td style="text-align: center;">{{$val1->Siswa->schorigin}}</td>
                                    <td style="text-align: center;">{{$val1->point}}</td>
                                    <td style="text-align: center;">{{$val1->status}}</td>
                                </tr>
                                @endforeach
                                @foreach ($NT as $val2)
                                <tr style="background-color: red">
                                    <td style="text-align: center; color:black">{{$rank++}}</td>
                                    <td style="text-align: center; color:black">{{$val2->Siswa->nisn}}</td>
                                    <td style="text-align: center; color:black">{{$val2->Siswa->nama}}</td>
                                    <td style="text-align: center; color:black">{{$val2->Siswa->schorigin}}</td>
                                    <td style="text-align: center; color:black">{{$val2->point}}</td>
                                    <td style="text-align: center; color:black">{{$val2->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        @endif
    @endforeach
    </div>
@endsection