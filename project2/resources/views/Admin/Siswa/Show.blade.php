@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <h3 class="card-title">Data Peserta Didik</h3>
                </div>
                <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" style="display: block;">
                            @csrf
    
                            @foreach ($user as $u)
                                <h3 style="border-top-style: dashed;"></h3>
                                <h3 style="margin-top: 2%;">Akun Siswa</h3>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ $u->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Dibuat Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nisn" value="{{ $u->created_at }}" readonly>
                                    </div>
                                </div>
                            @endforeach
    
                            @foreach ($siswa as $val)
                        <h3 style="border-top-style: dashed;"></h3>
                        <h3 style="margin-top: 2%;">Verifikasi Data Siswa</h3>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                @if ($val->nama != null)
                                <input type="text" class="form-control" name="nama" value="{{$val->nama}}" readonly>
                                @else
                                <input type="text" class="form-control" name="nama" value="" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                @if ($val->nisn != null)
                                <input type="number" class="form-control" name="nisn" value="{{$val->nisn}}" readonly>
                                @elseif($val->nisn === null)
                                <input type="number" class="form-control" name="nisn" value="" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 2%;">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-10">
                                @if ($val->schorigin != null)
                                <input type="text" class="form-control" name="schorigin" value="{{$val->schorigin}}" readonly>
                                @elseif($val->schorigin === null)
                                <input type="text" class="form-control" name="schorigin" value="" readonly>
                                @endif
                            </div>
                        </div>
    
                        <h3 style="border-top-style: dashed;"></h3>
                        <h3 style="margin-top: 2%;">Biodata Siswa</h3>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">           
                                <input type="text" class="form-control" id="name" name="name" value="{{$val->nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                            <div class="col">
                                @if ($val->pob == null)
                                <input type="text" class="form-control" id="pob" name="pob" value="" readonly>
                                @else
                                <input type="text" class="form-control" id="pob" name="pob" value="{{$val->pob}}" readonly>
                                @endif
                            </div>
                            <div class="col">
                                @if ($val->dob == null)
                                <input type="date" class="form-control" id="dob" name="dob" value="" readonly>
                                @else
                                <input type="date" class="form-control" id="dob" name="dob" value="{{$val->dob}}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col">
                                @if ($val->religion == null)
                                <input type="text" class="form-control" id="religion" name="religion" value="" readonly>
                                @else
                                <input type="text" class="form-control" id="religion" name="religion" value="{{$val->religion}}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col">
                                @if ($val->gender == null)
                                <input type="text" class="form-control" id="gender" name="gender" value="" readonly>
                                @else
                                <input type="text" class="form-control" id="gender" name="gender" value="{{$val->gender}}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                @if ($val->phone == null)
                                <input type="number" class="form-control" id="phone" name="phone" value="" readonly>
                                @else
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$val->phone}}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 2%;">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                @if ($val->address == null)
                                <textarea type="text" class="form-control" id="address" name="address" rows="5" readonly></textarea>
                                @else
                                <textarea type="text" class="form-control" id="address" name="address" rows="5" readonly>{{$val->address}}</textarea>
                                @endif
                            </div>
                        </div>
                        @endforeach
    
                        @foreach ($ortu as $val)
                        <h3 style="border-top-style: dashed;"></h3>
                        <h3 style="margin-top: 2%;">Data Orang Tua</h3>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                @if ($val->dname == null)
                                <input type="text" class="form-control" id="dname" name="dname" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="dname" name="dname" value="{{$val->dname}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-sm-10">
                                @if ($val->djob == null)
                                <input type="text" class="form-control" id="djob" name="djob" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="djob" name="djob" value="{{$val->djob}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Ayah</label>
                            <div class="col-sm-10">
                                @if ($val->ddegree == null)
                                <input type="text" class="form-control" id="ddegree" name="ddegree" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="ddegree" name="ddegree" value="{{$val->ddegree}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                @if ($val->dphone == null)
                                <input type="text" class="form-control" id="dphone" name="dphone" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="dphone" name="dphone" value="{{$val->dphone}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                @if ($val->daddress == null)
                                <textarea type="text" class="form-control" id="daddress" name="daddress" rows="5" readonly></textarea>
                                @else
                                <textarea type="text" class="form-control" id="daddress" name="daddress" rows="5" readonly>{{$val->daddress}}</textarea>
                                @endif
                            </div>
                        </div>
                        
                        <h5>&nbsp;</h5>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ibu</label>
                            <div class="col-sm-10">
                                @if ($val->mname == null)
                                <input type="text" class="form-control" id="mname" name="mname" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="mname" name="mname" value="{{$val->mname}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-sm-10">
                                @if ($val->mjob == null)
                                <input type="text" class="form-control" id="mjob" name="mjob" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="mjob" name="mjob" value="{{$val->mjob}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Ibu</label>
                            <div class="col-sm-10">
                                @if ($val->mdegree == null)
                                <input type="text" class="form-control" id="mdegree" name="mdegree" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="mdegree" name="mdegree" value="{{$val->mdegree}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                @if ($val->mphone == null)
                                <input type="text" class="form-control" id="mphone" name="mphone" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="mphone" name="mphone" value="{{$val->mphone}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                @if ($val->maddress == null)
                                <textarea type="text" class="form-control" id="maddress" name="maddress" rows="5" readonly></textarea>
                                @else
                                <textarea type="text" class="form-control" id="maddress" name="maddress" rows="5" readonly>{{$val->maddress}}</textarea>
                                @endif
                            </div>
                        </div>
    
                        <h5>&nbsp;</h5>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Wali</label>
                            <div class="col-sm-10">
                                @if ($val->wname == null)
                                <input type="text" class="form-control" id="wname" name="wname" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="wname" name="wname" value="{{$val->wname}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Wali</label>
                            <div class="col-sm-10">
                                @if ($val->wjob == null)
                                <input type="text" class="form-control" id="wjob" name="wjob" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="wjob" name="wjob" value="{{$val->wjob}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Wali</label>
                            <div class="col-sm-10">
                                @if ($val->wdegree == null)
                                <input type="text" class="form-control" id="wdegree" name="wdegree" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="wdegree" name="wdegree" value="{{$val->wdegree}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon Orang Tua</label>
                            <div class="col-sm-10">
                                @if ($val->wphone == null)
                                <input type="number" class="form-control" id="wphone" name="wphone" value="" readonly> 
                                @else
                                <input type="number" class="form-control" id="wphone" name="wphone" value="{{$val->wphone}}" readonly> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 2%;">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                            <div class="col-sm-10">
                                @if ($val->waddress == null)
                                <textarea type="text" class="form-control" id="waddress" name="waddress" rows="5" readonly></textarea>
                                @else
                                <textarea type="text" class="form-control" id="waddress" name="waddress" rows="5" readonly>{{$val->waddress}}</textarea>
                                @endif
                            </div>
                        </div>
                        @endforeach
    
                        @foreach ($archieve as $val)  
                        <h3 style="border-top-style: dashed;"></h3>
                        <h3 style="margin-top: 2%;">Pemberkasan</h3>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pas Foto 3x4</label>
                            @if ($val->foto == null)
                            <div class="col">
                                <input type="text" class="form-control" id="foto" name="foto" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="foto" name="foto" value="{{ $val->foto }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->foto)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Kartu Keluarga</label>
                            @if ($val->kk == null)
                            <div class="col">
                                <input type="text" class="form-control" id="kk" name="kk" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="kk" name="kk" value="{{ $val->kk }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->kk)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Akta Kelahiran</label>
                            @if ($val->akta == null)
                            <div class="col">
                                <input type="text" class="form-control" id="akta" name="akta" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="akta" name="akta" value="{{ $val->akta }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->akta)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan NISN</label>
                            @if ($val->nisn == null)
                            <div class="col">
                                <input type="text" class="form-control" id="nisn" name="nisn" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $val->nisn }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->nisn)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 1</label>
                            @if ($val->raport1 == null)
                            <div class="col">
                                <input type="text" class="form-control" id="raport1" name="raport1" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="raport1" name="raport1" value="{{ $val->raport1 }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->raport1)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 2</label>
                            @if ($val->raport2 == null)
                            <div class="col">
                                <input type="text" class="form-control" id="raport2" name="raport2" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="raport2" name="raport2" value="{{ $val->raport2 }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->raport2)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 3</label>
                            @if ($val->raport3 == null)
                            <div class="col">
                                <input type="text" class="form-control" id="raport3" name="raport3" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="raport3" name="raport3" value="{{ $val->raport3 }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->raport3)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 4</label>
                            @if ($val->raport4 == null)
                            <div class="col">
                                <input type="text" class="form-control" id="raport4" name="raport4" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="raport4" name="raport4" value="{{ $val->raport4 }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->raport4)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 5</label>
                            @if ($val->raport5 == null)
                            <div class="col">
                                <input type="text" class="form-control" id="raport5" name="raport5" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="raport5" name="raport5" value="{{ $val->raport5 }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->raport5)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Scan Surat Keterangan Lulus</label>
                            @if ($val->skl == null)
                            <div class="col">
                                <input type="text" class="form-control" id="skl" name="skl" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="skl" name="skl" value="{{ $val->skl }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($val->skl)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        @endforeach
    
                        @foreach ($psb as $psb)
                        <h3 style="border-top-style: dashed;"></h3>
                        <h3 style="margin-top: 2%;">Pembayaran Program PSB</h3>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Referensi </label>
                            <div class="col">
                                @if ($psb->noref == null)
                                <input type="text" class="form-control" id="noref" name="noref" value="" readonly> 
                                @else
                                <input type="text" class="form-control" id="noref" name="noref" value="{{$psb->noref}}" readonly> 
                                @endif
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Bukti Transfer</label>
                            @if ($psb->bukti_tf == null)
                            <div class="col">
                                <input type="text" class="form-control" id="bukti_tf" name="bukti_tf" value="Berkas tidak dilampirkan!" readonly>
                            </div>
                            <div class="col">
                            </div>
                            @else
                            <div class="col">
                                <input type="text" class="form-control" id="bukti_tf" name="bukti_tf" value="{{ $psb->bukti_tf }}" readonly>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ asset($psb->bukti_tf)}}" target="_blank">Preview</a>
                            </div>
                            @endif
                        </div>
                        @endforeach
    
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
                                @foreach ($seleksi as $sel)
                                <div class="col">
                                    <input type="number" class="form-control" name="ing1" value="{{$sel->point}}" readonly>   
                                </div>  
                                @endforeach 
                            </div>
                        </div>
                    @endforeach
    
                            @foreach ($spp as $spp)
                                <h3 style="border-top-style: dashed;"></h3>
                                <h3 style="margin-top: 2%;">Pembayaran SPP</h3>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Referensi</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="noref" name="noref" value="{{ $spp->noref }}" readonly>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Bukti Transfer</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="bukti_tf" name="bukti_tf" value="{{ $spp->bukti_tf }}" readonly>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" href="{{ asset($spp->bukti_tf) }}" target="_blank">Preview</a>
                                    </div>
                                </div>
                            @endforeach
    
                            <div class="card-footer">
                                <a href="{{ route('utilities.siswa') }}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>
    
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection