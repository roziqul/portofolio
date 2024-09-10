@extends('Public.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Status Pendataan</h1>
    @foreach ($fitur as $f)
        @if ($f->status == 'NON ACTIVE')
            <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>

        @else 
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Nomor Pendaftaran</th>
                                    <th style="text-align: center;">NISN</th>
                                    <th style="text-align: center;">Nama Lengkap</th>
                                    <th style="text-align: center;">Asal Sekolah</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Catatan dari Admin</th>
                                    <th style="text-align: center;">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($value as $val)  
                                <tr>
                                    <td style="text-align: center;">{{$val->users_id}}</td>
                                    <td style="text-align: center;">{{$val->nisn}}</td>
                                    <td style="text-align: center;">{{$val->nama}}</td>
                                    <td style="text-align: center;">{{$val->schorigin}}</td>
                                    <td style="text-align: center;">
                                        @if ($val->status == 'NOT VERIFIED')
                                        <a href="#" class="btn btn-danger">
                                            <span class="text">NOT VERIFIED</span>
                                        </a>
                                        @elseif ($val->status == 'WAITING VERIFICATION')
                                        <a href="#" class="btn btn-warning">
                                            <span class="text">WAITING VERIFICATION</span>
                                        </a>
                                        @elseif ($val->status == 'VERIFIED')
                                        <a href="#" class="btn btn-success">
                                            <span class="text">VERIFIED</span>
                                        </a>
                                        @elseif ($val->status == 'REJECTED')
                                        <a href="#" class="btn btn-danger">
                                            <span class="text">BERKAS DITOLAK</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{$val->note}}</td>
                                    <td style="text-align: center;">
                                        @if ($val->status == 'WAITING VERIFICATION')
                                        <a href="{{ route('post.pendataan.status')}}" class="btn btn-danger">
                                            <span class="text">CANCEL</span>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @foreach ($value as $val)
                        @if ($val->status == 'VERIFIED')
                        <a href="{{ route('get.seleksi.input-nilai')}}" class="btn btn-primary float-right" style="width:15%">
                            <span class="text">Lanjutkan</span>
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>    
                        @endif                  
                        @endforeach
                    </div>
                </div>
            </div>

        @endif
    @endforeach
</div>
@endsection