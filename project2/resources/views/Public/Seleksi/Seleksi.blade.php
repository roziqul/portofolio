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
                    <form action="{{ route('post.seleksi.input-nilai')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                        @if ($f->status == 'NON ACTIVE')
                            <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>
                        @else
                            @foreach ($siswa as $s)
                                @if ($s->status == 'VERIFIED' || $s->status == 'ACTIVE')
                                    <h3>Seleksi PSB</h3>

                                    @foreach ($daftar as $d)
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Peserta</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" value="{{$d->siswa_id}}" readonly>
                                            </div>
                                        </div>

                                    @foreach ($siswa as $s)  
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" value="{{$s->nama}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">NISN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" value="{{$s->nisn}}" readonly>
                                            </div>
                                        </div>
                                    @endforeach

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
                                                    @if ($d->agm1 == null)
                                                    <input type="number" class="form-control" name="agm1" value="" required>
                                                    @elseif ($d->agm1 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="agm1" value="{{$d->agm1}}" required>
                                                    @elseif ($d->agm1 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="agm1" value="{{$d->agm1}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->agm2 == null)
                                                    <input type="number" class="form-control" name="agm2" value="" required>
                                                    @elseif ($d->agm2 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="agm2" value="{{$d->agm2}}" required>
                                                    @elseif ($d->agm2 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="agm2" value="{{$d->agm2}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->agm3 == null)
                                                    <input type="number" class="form-control" name="agm3" value="" required>
                                                    @elseif ($d->agm3 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="agm3" value="{{$d->agm3}}" required>
                                                    @elseif ($d->agm3 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="agm3" value="{{$d->agm3}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->agm4 == null)
                                                    <input type="number" class="form-control" name="agm4" value="" required>
                                                    @elseif ($d->agm4 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="agm4" value="{{$d->agm4}}" required>
                                                    @elseif ($d->agm4 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="agm4" value="{{$d->agm4}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->agm5 == null)
                                                    <input type="number" class="form-control" name="agm5" value="" required>
                                                    @elseif ($d->agm5 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="agm5" value="{{$d->agm5}}" required>
                                                    @elseif ($d->agm5 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="agm5" value="{{$d->agm5}}" readonly>   
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Bahasa Indonesia</label>
                                                <div class="col">
                                                    @if ($d->ind1 == null)
                                                    <input type="number" class="form-control" name="ind1" value="" required>
                                                    @elseif ($d->ind1 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ind1" value="{{$d->ind1}}" required>
                                                    @elseif ($d->ind1 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ind1" value="{{$d->ind1}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ind2 == null)
                                                    <input type="number" class="form-control" name="ind2" value="" required>
                                                    @elseif ($d->ind2 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ind2" value="{{$d->ind2}}" required>
                                                    @elseif ($d->ind2 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ind2" value="{{$d->ind2}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ind3 == null)
                                                    <input type="number" class="form-control" name="ind3" value="" required>
                                                    @elseif ($d->ind3 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ind3" value="{{$d->ind3}}" required>
                                                    @elseif ($d->ind3 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ind3" value="{{$d->ind3}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ind4 == null)
                                                    <input type="number" class="form-control" name="ind4" value="" required>
                                                    @elseif ($d->ind4 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ind4" value="{{$d->ind4}}" required>
                                                    @elseif ($d->ind4 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ind4" value="{{$d->ind4}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ind5 == null)
                                                    <input type="number" class="form-control" name="ind5" value="" required>
                                                    @elseif ($d->ind5 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ind5" value="{{$d->ind5}}" required>
                                                    @elseif ($d->ind5 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ind5" value="{{$d->ind5}}" readonly>   
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Matematika</label>
                                                <div class="col">
                                                    @if ($d->mat1 == null)
                                                    <input type="number" class="form-control" name="mat1" value="" required>
                                                    @elseif ($d->mat1 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="mat1" value="{{$d->mat1}}" required>
                                                    @elseif ($d->mat1 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="mat1" value="{{$d->mat1}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->mat2 == null)
                                                    <input type="number" class="form-control" name="mat2" value="" required>
                                                    @elseif ($d->mat2 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="mat2" value="{{$d->mat2}}" required>
                                                    @elseif ($d->mat2 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="mat2" value="{{$d->mat2}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->mat3 == null)
                                                    <input type="number" class="form-control" name="mat3" value="" required>
                                                    @elseif ($d->mat3 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="mat3" value="{{$d->mat3}}" required>
                                                    @elseif ($d->mat3 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="mat3" value="{{$d->mat3}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->mat4 == null)
                                                    <input type="number" class="form-control" name="mat4" value="" required>
                                                    @elseif ($d->mat4 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="mat4" value="{{$d->mat4}}" required>
                                                    @elseif ($d->mat4 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="mat4" value="{{$d->mat4}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->mat5 == null)
                                                    <input type="number" class="form-control" name="mat5" value="" required>
                                                    @elseif ($d->mat5 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="mat5" value="{{$d->mat5}}" required>
                                                    @elseif ($d->mat5 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="mat5" value="{{$d->mat5}}" readonly>   
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata IPA</label>
                                                <div class="col">
                                                    @if ($d->ipa1 == null)
                                                    <input type="number" class="form-control" name="ipa1" value="" required>
                                                    @elseif ($d->ipa1 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ipa1" value="{{$d->ipa1}}" required>
                                                    @elseif ($d->ipa1 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ipa1" value="{{$d->ipa1}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ipa2 == null)
                                                    <input type="number" class="form-control" name="ipa2" value="" required>
                                                    @elseif ($d->ipa2 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ipa2" value="{{$d->ipa2}}" required>
                                                    @elseif ($d->ipa2 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ipa2" value="{{$d->ipa2}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ipa3 == null)
                                                    <input type="number" class="form-control" name="ipa3" value="" required>
                                                    @elseif ($d->ipa3 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ipa3" value="{{$d->ipa3}}" required>
                                                    @elseif ($d->ipa3 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ipa3" value="{{$d->ipa3}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ipa4 == null)
                                                    <input type="number" class="form-control" name="ipa4" value="" required>
                                                    @elseif ($d->ipa4 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ipa4" value="{{$d->ipa4}}" required>
                                                    @elseif ($d->ipa4 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ipa4" value="{{$d->ipa4}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ipa5 == null)
                                                    <input type="number" class="form-control" name="ipa5" value="" required>
                                                    @elseif ($d->ipa5 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ipa5" value="{{$d->ipa5}}" required>
                                                    @elseif ($d->ipa5 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ipa5" value="{{$d->ipa5}}" readonly>   
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Bahasa Inggris</label>
                                                <div class="col">
                                                    @if ($d->ing1 == null)
                                                    <input type="number" class="form-control" name="ing1" value="" required>
                                                    @elseif ($d->ing1 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->ing1}}" required>
                                                    @elseif ($d->ing1 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ing1" value="{{$d->ing1}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ing2 == null)
                                                    <input type="number" class="form-control" name="ing2" value="" required>
                                                    @elseif ($d->ing2 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ing2" value="{{$d->ing2}}" required>
                                                    @elseif ($d->ing2 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ing2" value="{{$d->ing2}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ing3 == null)
                                                    <input type="number" class="form-control" name="ing3" value="" required>
                                                    @elseif ($d->ing3 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ing3" value="{{$d->ing3}}" required>
                                                    @elseif ($d->ing3 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ing3" value="{{$d->ing3}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ing4 == null)
                                                    <input type="number" class="form-control" name="ing4" value="" required>
                                                    @elseif ($d->ing4 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ing4" value="{{$d->ing4}}" required>
                                                    @elseif ($d->ing4 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ing4" value="{{$d->ing4}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->ing5 == null)
                                                    <input type="number" class="form-control" name="ing5" value="" required>
                                                    @elseif ($d->ing5 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="ing5" value="{{$d->ing5}}" required>
                                                    @elseif ($d->ing5 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="ing5" value="{{$d->ing5}}" readonly>   
                                                    @endif
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
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nilai Rata-Rata Raport</label>
                                                <div class="col">
                                                    @if ($d->raport1 == null)
                                                    <input type="number" class="form-control" name="raport1" value="" required>
                                                    @elseif ($d->raport1 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="raport1" value="{{$d->raport1}}" required>
                                                    @elseif ($d->raport1 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="raport1" value="{{$d->raport1}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->raport2 == null)
                                                    <input type="number" class="form-control" name="raport2" value="" required>
                                                    @elseif ($d->raport2 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="raport2" value="{{$d->raport2}}" required>
                                                    @elseif ($d->raport2 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="raport2" value="{{$d->raport2}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->raport3 == null)
                                                    <input type="number" class="form-control" name="raport3" value="" required>
                                                    @elseif ($d->raport3 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="raport3" value="{{$d->raport3}}" required>
                                                    @elseif ($d->raport3 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="raport3" value="{{$d->raport3}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->raport4 == null)
                                                    <input type="number" class="form-control" name="raport4" value="" required>
                                                    @elseif ($d->raport4 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="raport4" value="{{$d->raport4}}" required>
                                                    @elseif ($d->raport4 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="raport4" value="{{$d->raport4}}" readonly>   
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if ($d->raport5 == null)
                                                    <input type="number" class="form-control" name="raport5" value="" required>
                                                    @elseif ($d->raport5 != null && $d->status == 'NOT VERIFIED')
                                                    <input type="number" class="form-control" name="raport5" value="{{$d->raport5}}" required>
                                                    @elseif ($d->raport5 != null && $d->status == 'VERIFIED')
                                                    <input type="number" class="form-control" name="raport5" value="{{$d->raport5}}" readonly>   
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    <div class="card-footer">
                                        @if ($d->status == 'NOT VERIFIED')
                                        <button type="submit" class="btn btn-success float-right">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </button>
                                        @elseif ($d->status != 'NOT VERIFIED')
                                        <a href="{{ route('get.seleksi.finalisasi')}}" class="btn btn-primary float-right">
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

                                @elseif ($s->status == 'VERIFIED')
                                    <h4>Harap lakukan finalisasi data terlebih dahulu</h4>
                                    
                                @elseif ($s->status == 'REJECTED')
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