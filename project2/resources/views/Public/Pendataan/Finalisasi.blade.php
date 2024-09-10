@extends('Public.Master')
@section('Content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Finalisasi Pendataan Peserta Didik</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.pendataan.finalisasi')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3> 
                                
                            @else
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
                                        <a class="btn btn-primary" href="{{$val->foto}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->kk}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->akta}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->nisn}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->raport1}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->raport2}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->raport3}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->raport4}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->raport5}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$val->skl}}" target="_blank">Preview</a>
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
                                        <a class="btn btn-primary" href="{{$psb->bukti_tf}}" target="_blank">Preview</a>
                                    </div>
                                    @endif
                                </div>
                                
                                <small>NB. Jika data yang diisi sudah sesuai, harap segera melakukan finalisasi supaya data dapat di verifikasi oleh Admin :)</small>

                                @foreach ($siswa as $val)
                                @foreach ($ortu as $ort)
                                @foreach ($archieve as $arc)
                                <div class="card-footer">
                                    <a href="{{ route('get.pendataan.payment')}}" class="btn btn-primary">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    @if ($val->status == 'NOT VERIFIED' && $val->nisn != null && $val->pob != null && $ort->dname != null && $arc->raport1 != null && $psb->noref != null)
                                    <button type="submit" class="btn btn-success float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">FINALISASI</span>
                                    </button>
                                    @elseif ($val->nisn == null || $val->pob == null || $ort->dname == null || $arc->raport1 == null || $psb->noref == null)
                                    <a href="#" class="btn btn-danger float-right">Tidak Dapat Melakukan Finalisasi</a>
                                    @elseif ($val->status != 'NOT VERIFIED')
                                    <button type="submit" class="btn btn-success" style="display: none"></button>  
                                    @endif
                                </div>
                                @endforeach    
                                @endforeach  
                                @endforeach
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