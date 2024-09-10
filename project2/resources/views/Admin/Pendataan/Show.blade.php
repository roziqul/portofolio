@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @foreach ($siswa as $val)                                        
                    <h3 class="card-title">Nomor Peserta {{$val->id}}</h3>
                    @endforeach
                </div>
                <div class="card-body">
                    <form action="{{ route('post.pendataan')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($siswa as $val)
                            <h3 style="border-top-style: dashed;"></h3>
                            <h3 style="margin-top: 2%;">Verifikasi Data Siswa</h3>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    @foreach ($user as $user)
                                        <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                                        <input type="hidden" class="form-control" name="id" value="{{$val->id}}" readonly>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="{{$val->nama}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="nisn" value="{{$val->nisn}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 2%;">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="schorigin" value="{{$val->schorigin}}" readonly>
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
                                    <input type="text" class="form-control" id="pob" name="pob" value="{{$val->pob}}" readonly>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" id="dob" name="dob" value="{{$val->dob}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="religion" name="religion" value="{{$val->religion}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="gender" name="gender" value="{{$val->gender}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$val->phone}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 2%;">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="address" name="address" rows="5" readonly>{{$val->address}}</textarea>
                                </div>
                            </div>
                        @endforeach
    
                        @foreach ($ortu as $val)
                            <h3 style="border-top-style: dashed;"></h3>
                            <h3 style="margin-top: 2%;">Data Orang Tua</h3>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dname" name="dname" value="{{$val->dname}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="djob" name="djob" value="{{$val->djob}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ddegree" name="ddegree" value="{{$val->ddegree}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dphone" name="dphone" value="{{$val->dphone}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="daddress" name="daddress" rows="5" readonly>{{$val->daddress}}</textarea>
                                </div>
                            </div>
                            
                            <h5>&nbsp;</h5>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mname" name="mname" value="{{$val->mname}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mjob" name="mjob" value="{{$val->mjob}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mdegree" name="mdegree" value="{{$val->mdegree}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mphone" name="mphone" value="{{$val->mphone}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="maddress" name="maddress" rows="5" readonly>{{$val->maddress}}</textarea>
                                </div>
                            </div>
    
                            <h5>&nbsp;</h5>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="wname" name="wname" value="{{$val->wname}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="wjob" name="wjob" value="{{$val->wjob}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Wali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="wdegree" name="wdegree" value="{{$val->wdegree}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="wphone" name="wphone" value="{{$val->wphone}}" readonly> 
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 2%;">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="waddress" name="waddress" rows="5" readonly>{{$val->waddress}}</textarea>
                                </div>
                            </div>
                        @endforeach
    
                        @foreach ($archieve as $val)  
                            <h3 style="border-top-style: dashed;"></h3>
                            <h3 style="margin-top: 2%;">Pemberkasan</h3>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pas Foto 3x4</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="foto" name="foto" value="{{ $val->foto }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->foto)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Kartu Keluarga</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="kk" name="kk" value="{{ $val->kk }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->kk)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Akta Kelahiran</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="akta" name="akta" value="{{ $val->akta }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->akta)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan NISN</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $val->nisn }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->nisn)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 1</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="raport1" name="raport1" value="{{ $val->raport1 }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->raport1)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 2</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="raport2" name="raport2" value="{{ $val->raport2 }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->raport2)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 3</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="raport3" name="raport3" value="{{ $val->raport3 }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->raport3)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 4</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="raport4" name="raport4" value="{{ $val->raport4 }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->raport4)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 5</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="raport5" name="raport5" value="{{ $val->raport5 }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->raport5)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Scan Surat Keterangan Lulus</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="skl" name="skl" value="{{ $val->skl }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($val->skl)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                        @endforeach
    
                        @foreach ($psb as $psb)
                            <h3 style="border-top-style: dashed;"></h3>
                            <h3 style="margin-top: 2%;">Pembayaran Program PSB</h3>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Referensi </label>
                                <div class="col">
                                    <input type="text" class="form-control" id="noref" name="noref" value="{{$psb->noref}}" readonly> 
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Bukti Transfer</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="bukti_tf" name="bukti_tf" value="{{ $psb->bukti_tf }}" readonly>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ asset($psb->bukti_tf)}}" target="_blank">Preview</a>
                                </div>
                            </div>
                        @endforeach
    
                        <div class="form-group row" style="margin-top: 2%;">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Catatan dari Admin</label>
                            <div class="col-sm-10">
                                @foreach ($siswa as $val)
                                @if ($val->note != null)
                                <textarea type="text" class="form-control" id="note" name="note" rows="5">{{$val->note}}</textarea>
                                @else
                                <textarea type="text" class="form-control" id="note" name="note" rows="5"></textarea>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('filterPendataan')}}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <div class="float-right">
                                @foreach ($siswa as $stat)
                                    @if ($stat->status == 'VERIFIED' && auth()->user()->role_id == 1)
                                        <button type="submit" class="btn btn-warning" name="status" value="WAITING VERIFICATION">UNVERIFIED</button>
                                    @elseif ($stat->status == 'WAITING VERIFICATION')
                                        <button type="submit" class="btn btn-danger" name="status" value="REJECTED">REJECT</button>
                                        <button type="submit" class="btn btn-warning" name="status" value="NOT VERIFIED">NOT VERIFIED</button>
                                        <button type="submit" class="btn btn-success" name="status" value="VERIFIED">VERIFIED</button>
                                    @elseif ($stat->status == 'REJECTED' && auth()->user()->role_id == 1)
                                        <button type="submit" class="btn btn-warning" name="status" value="NOT VERIFIED">UNREJECT</button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection