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
                    <form action="{{ route('post.pendataan.biodata')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>
                            @else
                                @foreach ($siswa as $val)
                                <h3>Biodata Siswa</h3>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">           
                                        <input type="text" class="form-control" id="name" name="name" value="{{$val->nama}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                                    <div class="col">
                                        @if ($val->pob != null && $val->status == 'NOT VERIFIED')
                                        <input type="text" class="form-control" id="pob" name="pob" value="{{$val->pob}}" oninput="this.value = this.value.toUpperCase()" required>
                                        @elseif ($val->pob != null && $val->status != 'NOT VERIFIED')
                                        <input type="text" class="form-control" id="pob" name="pob" value="{{$val->pob}}" readonly>
                                        @elseif ($val->pob == null)
                                        <input type="text" class="form-control" id="pob" name="pob" value="" oninput="this.value = this.value.toUpperCase()" required>
                                        @endif
                                    </div>
                                    <div class="col">
                                        @if ($val->dob != null && $val->status == 'NOT VERIFIED')
                                        <input type="date" class="form-control" id="dob" name="dob" value="{{$val->dob}}" required>
                                        @elseif ($val->dob != null && $val->status != 'NOT VERIFIED')
                                        <input type="date" class="form-control" id="dob" name="dob" value="{{$val->dob}}" readonly>
                                        @elseif ($val->dob == null)
                                        <input type="date" class="form-control" id="dob" name="dob" value="" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        @if ($val->religion != null && $val->status == 'NOT VERIFIED')
                                        <select name="religion" id="religion" class="form-control" required>
                                            <option value="{{$val->religion}}" selected>{{$val->religion}}</option>
                                            @foreach ($religions as $rlg)
                                                @if ($val->religion != $rlg)
                                                <option value="{{$rlg}}">{{$rlg}}</option>  
                                                @endif
                                            @endforeach
                                        </select>  
                                        @elseif ($val->religion != null && $val->status != 'NOT VERIFIED')
                                        <input type="text" class="form-control" id="religion" name="religion" value="{{$val->religion}}" readonly> 
                                        @elseif ($val->religion == null)
                                        <select name="religion" id="religion" class="form-control" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            @foreach ($religions as $rlg)
                                                <option value="{{$rlg}}">{{$rlg}}</option>
                                            @endforeach
                                        </select>   
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        @if ($val->gender != null && $val->status == 'NOT VERIFIED')
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="{{$val->gender}}" selected>{{$val->gender}}</option>
                                            @foreach ($genders as $gdr)
                                                @if ($val->gender != $gdr)
                                                <option value="{{$gdr}}">{{$gdr}}</option>
                                                @endif
                                            @endforeach
                                        </select> 
                                        @elseif ($val->gender != null && $val->status != 'NOT VERIFIED')
                                        <input type="text" class="form-control" id="gender" name="gender" value="{{$val->gender}}" readonly> 
                                        @elseif ($val->gender == null)
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            @foreach ($genders as $gdr)
                                                <option value="{{$gdr}}">{{$gdr}}</option>
                                            @endforeach
                                        </select>
                                        @endif  
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-10">
                                        @if ($val->phone != null && $val->status == 'NOT VERIFIED')
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{$val->phone}}" required>
                                        @elseif ($val->phone != null && $val->status != 'NOT VERIFIED')
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{$val->phone}}" readonly>
                                        @elseif ($val->phone == null)
                                        <input type="number" class="form-control" id="phone" name="phone" value="" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 2%;">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        @if ($val->address != null && $val->status == 'NOT VERIFIED')
                                        <textarea type="text" class="form-control" id="address" name="address" rows="5" oninput="this.value = this.value.toUpperCase()" required>{{$val->address}}</textarea>
                                        @elseif ($val->address != null && $val->status != 'NOT VERIFIED')
                                        <textarea type="text" class="form-control" id="address" name="address" rows="5" readonly>{{$val->address}}</textarea>
                                        @elseif ($val->address == null)
                                        <textarea type="text" class="form-control" id="address" name="address" rows="5" oninput="this.value = this.value.toUpperCase()" required></textarea>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <a href="{{ route('get.pendataan.verifikasi')}}" class="btn btn-primary">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    <div class="float-right">
                                    @if ($val->status == 'NOT VERIFIED')
                                    <button type="submit" class="btn btn-success">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Simpan</span>
                                    </button>
                                    @elseif ($val->status == 'VERIFIED' || 'WAITING VERIFICATION')
                                    <a href="{{ route('get.pendataan.ortu')}}" class="btn btn-primary">
                                        <span class="text">Selanjutnya</span>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </a>
                                    @endif
                                    </div>
                                </div>
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