@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="float-right">
                <a href="{{route('utilities.siswa.export')}}" class="btn btn-success" style="margin-bottom: 10px">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Export Excel</span>
                </a>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">NISN</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Asal Sekolah</th>
                            <th style="text-align: center;">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($value as $val)
                        <tr>
                            <td style="text-align: center;">{{$val->id}}</td>
                            <td style="text-align: center;">{{$val->nisn}}</td>
                            <td style="text-align: center;">{{$val->nama}}</td>
                            <td style="text-align: center;">{{$val->schorigin}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('utilities.siswa.detail',$val->id)}}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection