@extends('Public.Master')
@section('Content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registrasi Program PSB</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.seleksi.finalisasi')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>
                            @else
                                @foreach ($siswa as $s)
                                @if ($s->status == 'VERIFIED' || $s->status == 'ACTIVE')
                                    <h3>Data Siswa</h3>
                                    @foreach ($user as $u)
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" value="{{ $u->email }}" readonly>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" value="{{$s->nama}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">NISN</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="nisn" value="{{$s->nisn}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-bottom: 2%;">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Asal Sekolah</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="schorigin" value="{{$s->schorigin}}" readonly>
                                            </div>
                                        </div>

                                    @foreach ($daftar as $d)
                                        <div id="nilai_div">
                                            <div class="form-group row" style="margin-bottom: 0px; margin-top: 2%;">
                                                <label class="col-sm-2 col-form-label">&nbsp;</label>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 1</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 2</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 3</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 4</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 5</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Pendidikan Agama</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="agm1" value="{{$d->agm1}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="agm2" value="{{$d->agm2}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="agm3" value="{{$d->agm3}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="agm4" value="{{$d->agm4}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="agm5" value="{{$d->agm5}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Bahasa Indonesia</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ind1" value="{{$d->ind1}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ind2" value="{{$d->ind2}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ind3" value="{{$d->ind3}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ind4" value="{{$d->ind4}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ind5" value="{{$d->ind5}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Matematika</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="mat1" value="{{$d->mat1}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="mat2" value="{{$d->mat2}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="mat3" value="{{$d->mat3}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="mat4" value="{{$d->mat4}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="mat5" value="{{$d->mat5}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata IPA</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ipa1" value="{{$d->ipa1}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ipa2" value="{{$d->ipa2}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ipa3" value="{{$d->ipa3}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ipa4" value="{{$d->ipa4}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ipa5" value="{{$d->ipa5}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Bahasa Inggris</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->ing1}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing2" value="{{$d->ing2}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing3" value="{{$d->ing3}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing4" value="{{$d->ing4}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing5" value="{{$d->ing5}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom: 0px; margin-top: 2%;">
                                                <label class="col-sm-2 col-form-label">&nbsp;</label>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 1</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 2</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 3</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 4</label>
                                                </div>
                                                <div class="col" style="text-align: center;">
                                                    <label>Semester 5</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Raport / Semester</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->raport1}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing2" value="{{$d->raport2}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing3" value="{{$d->raport3}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing4" value="{{$d->raport4}}" readonly>   
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing5" value="{{$d->raport5}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Raport Akumulatif</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->raport_avg}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Matpel Spesifik</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->subject_avg}}" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Akumulatif</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->point}}" readonly>   
                                                </div>  
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer">
                                            <a href="{{ route('get.seleksi.input-nilai')}}" class="btn btn-primary">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-left"></i>
                                                </span>
                                                <span class="text">Kembali</span>
                                            </a>
                                            @if ($d->status == 'NOT VERIFIED')
                                            <button type="submit" class="btn btn-success float-right">Finalisasi</button>
                                            @elseif ($d->status == 'VERIFIED')
                                            <a href="{{ route('get.seleksi.status')}}" class="btn btn-primary">
                                                <span class="text">Selanjutnya</span>
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                            @endif
                                        </div>
                                    @endforeach

                                @elseif ($s->status == 'WAITING VERIFICATION')
                                    <h4>Berkas masih dalam proses verifikasi, mohon tunggu</h4>

                                @elseif ($s->status == 'NOT VERIFIED')
                                    <h4>Harap lakukan finalisasi data terlebih dahulu</h4>

                                @elseif ($s->status == 'Tertolak')
                                    <h4>Berkas anda ditolak</h4>
                                @endif
                                @endforeach

                        @endif
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection