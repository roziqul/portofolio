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
                    <form action="{{ route('post.pendataan.ortu')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>

                            @else
                                @foreach ($siswa as $ss)
                                    @foreach ($ortu as $val)
                                    <h3>Data Orang Tua</h3>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ayah</label>
                                        <div class="col-sm-10">
                                            @if ($val->dname != null && $ss->status == 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="dname" name="dname" value="{{$val->dname}}" oninput="this.value = this.value.toUpperCase()" required> 
                                            @elseif ($val->dname != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="dname" name="dname" value="{{$val->dname}}" readonly>
                                            @elseif ($val->dname == null)
                                            <input type="text" class="form-control" id="dname" name="dname" value="" oninput="this.value = this.value.toUpperCase()" required>  
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                        <div class="col-sm-10">
                                            @if ($val->djob != null && $ss->status == 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="djob" name="djob" value="{{$val->djob}}" oninput="this.value = this.value.toUpperCase()">
                                            @elseif ($val->djob != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="djob" name="djob" value="{{$val->djob}}" readonly>
                                            @elseif ($val->djob == null)
                                            <input type="text" class="form-control" id="djob" name="djob" value="" oninput="this.value = this.value.toUpperCase()">  
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Ayah</label>
                                        <div class="col-sm-10">
                                            @if ($val->ddegree != null && $ss->status == 'NOT VERIFIED')
                                            <select name="ddegree" id="ddegree" class="form-control">
                                                <option value="{{$val->ddegree}}" selected>{{$val->ddegree}}</option>
                                                @foreach ($degrees as $dgr)
                                                    @if ($val->ddegree != $dgr)
                                                    <option value="{{$dgr}}">{{$dgr}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @elseif ($val->ddegree != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="ddegree" name="ddegree" value="{{$val->ddegree}}" readonly> 
                                            @elseif ($val->ddegree == null)
                                            <select name="ddegree" id="ddegree" class="form-control">
                                                <option value="" selected disabled>Pilih...</option>
                                                @foreach ($degrees as $dgr)
                                                    <option value="{{$dgr}}">{{$dgr}}</option>
                                                @endforeach
                                            </select>
                                            @endif  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-10">
                                            @if ($val->dphone != null && $ss->status == 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="dphone" name="dphone" value="{{$val->dphone}}">
                                            @elseif ($val->dphone != null && $ss->status != 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="dphone" name="dphone" value="{{$val->dphone}}" readonly>
                                            @elseif ($val->dphone == null)
                                            <input type="number" class="form-control" id="dphone" name="dphone" value=""> 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom: 2%;">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            @if ($val->daddress != null && $ss->status == 'NOT VERIFIED')
                                            <textarea type="text" class="form-control" id="daddress" name="daddress" rows="5" oninput="this.value = this.value.toUpperCase()">{{$val->daddress}}</textarea>
                                            @elseif ($val->daddress != null && $ss->status != 'NOT VERIFIED')
                                            <textarea type="text" class="form-control" id="daddress" name="daddress" rows="5" readonly>{{$val->daddress}}</textarea>
                                            @elseif ($val->daddress == null)
                                            <textarea type="text" class="form-control" id="daddress" name="daddress" rows="5" oninput="this.value = this.value.toUpperCase()"></textarea>
                                            @endif
                                        </div>
                                    </div>

                                    <h5>&nbsp;</h5>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ibu</label>
                                        <div class="col-sm-10">
                                            @if ($val->mname != null && $ss->status == 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="mname" name="mname" value="{{$val->mname}}" oninput="this.value = this.value.toUpperCase()" required>
                                            @elseif ($val->mname != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="mname" name="mname" value="{{$val->mname}}" readonly>
                                            @elseif ($val->mname == null)
                                            <input type="text" class="form-control" id="mname" name="mname" value="" oninput="this.value = this.value.toUpperCase()" required>  
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                        <div class="col-sm-10">
                                            @if ($val->mjob != null && $ss->status == 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="mjob" name="mjob" value="{{$val->mjob}}" oninput="this.value = this.value.toUpperCase()">
                                            @elseif ($val->mjob != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="mjob" name="mjob" value="{{$val->mjob}}" readonly>
                                            @elseif ($val->mjob == null)
                                            <input type="text" class="form-control" id="mjob" name="mjob" value="" oninput="this.value = this.value.toUpperCase()">  
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Ibu</label>
                                        <div class="col-sm-10">
                                            @if ($val->mdegree != null && $ss->status == 'NOT VERIFIED')
                                            <select name="mdegree" id="mdegree" class="form-control">
                                                <option value="{{$val->mdegree}}" selected>{{$val->mdegree}}</option>
                                                @foreach ($degrees as $dgr)
                                                    @if ($val->mdegree != $dgr)
                                                    <option value="{{$dgr}}">{{$dgr}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @elseif ($val->mdegree != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="mdegree" name="mdegree" value="{{$val->mdegree}}" readonly>
                                            @elseif ($val->mdegree == null)
                                            <select name="mdegree" id="mdegree" class="form-control">
                                                <option value="" selected disabled>Pilih...</option>
                                                @foreach ($degrees as $dgr)
                                                    <option value="{{$dgr}}">{{$dgr}}</option>
                                                @endforeach
                                            </select> 
                                            @endif  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-10">
                                            @if ($val->mphone != null && $ss->status == 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="mphone" name="mphone" value="{{$val->mphone}}">
                                            @elseif ($val->mphone != null && $ss->status != 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="mphone" name="mphone" value="{{$val->mphone}}" readonly>
                                            @elseif ($val->mphone == null)
                                            <input type="number" class="form-control" id="mphone" name="mphone" value=""> 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom: 2%;">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            @if ($val->maddress != null && $ss->status == 'NOT VERIFIED')
                                            <textarea type="text" class="form-control" id="maddress" name="maddress" rows="5" oninput="this.value = this.value.toUpperCase()">{{$val->maddress}}</textarea>
                                            @elseif ($val->maddress != null && $ss->status != 'NOT VERIFIED')
                                            <textarea type="text" class="form-control" id="maddress" name="maddress" rows="5" readonly>{{$val->maddress}}</textarea>
                                            @elseif ($val->maddress == null)
                                            <textarea type="text" class="form-control" id="maddress" name="maddress" rows="5" oninput="this.value = this.value.toUpperCase()"></textarea>
                                            @endif
                                            <small>
                                                * jika orang tua telah tiada , maka yang wajib diisi hanya bagian nama saja.
                                            </small>
                                        </div>
                                    </div>
                                    

                                    <h5>&nbsp;</h5>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Wali</label>
                                        <div class="col-sm-10">
                                            @if ($val->wname != null && $ss->status == 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="wname" name="wname" value="{{$val->wname}}" oninput="this.value = this.value.toUpperCase()" required>
                                            @elseif ($val->wname != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="wname" name="wname" value="{{$val->wname}}" readonly>
                                            @elseif ($val->wname == null)
                                            <input type="text" class="form-control" id="wname" name="wname" value="" oninput="this.value = this.value.toUpperCase()" required>  
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Pekerjaan Wali</label>
                                        <div class="col-sm-10">
                                            @if ($val->wjob != null && $ss->status == 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="wjob" name="wjob" value="{{$val->wjob}}" oninput="this.value = this.value.toUpperCase()" required>
                                            @elseif ($val->wjob != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="wjob" name="wjob" value="{{$val->wjob}}" readonly>
                                            @elseif ($val->wjob == null)
                                            <input type="text" class="form-control" id="wjob" name="wjob" value="" oninput="this.value = this.value.toUpperCase()" required>  
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Wali</label>
                                        <div class="col-sm-10">
                                            @if ($val->wdegree != null && $ss->status == 'NOT VERIFIED')
                                            <select name="wdegree" id="wdegree" class="form-control" required>
                                                <option value="{{$val->wdegree}}" selected>{{$val->wdegree}}</option>
                                                @foreach ($degrees as $dgr)
                                                    @if ($val->wdegree != $dgr)
                                                    <option value="{{$dgr}}">{{$dgr}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @elseif ($val->wdegree != null && $ss->status != 'NOT VERIFIED')
                                            <input type="text" class="form-control" id="wdegree" name="wdegree" value="{{$val->wdegree}}" readonly>
                                            @elseif ($val->wdegree == null)
                                            <select name="wdegree" id="wdegree" class="form-control">
                                                <option value="" selected disabled>Pilih...</option>
                                                @foreach ($degrees as $dgr)
                                                    <option value="{{$dgr}}">{{$dgr}}</option>
                                                @endforeach
                                            </select> 
                                            @endif  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-10">
                                            @if ($val->wphone != null && $ss->status == 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="wphone" name="wphone" value="{{$val->wphone}}" required>
                                            @elseif ($val->wphone != null && $ss->status != 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="wphone" name="wphone" value="{{$val->wphone}}" readonly>
                                            @elseif ($val->wphone == null)
                                            <input type="number" class="form-control" id="wphone" name="wphone" value="" required> 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom: 2%;">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            @if ($val->waddress != null && $ss->status == 'NOT VERIFIED')
                                            <textarea type="text" class="form-control" id="waddress" name="waddress" rows="5" oninput="this.value = this.value.toUpperCase()" required>{{$val->waddress}}</textarea>
                                            @elseif ($val->waddress != null && $ss->status != 'NOT VERIFIED')
                                            <textarea type="text" class="form-control" id="waddress" name="waddress" rows="5" readonly>{{$val->waddress}}</textarea>
                                            @elseif ($val->waddress == null)
                                            <textarea type="text" class="form-control" id="waddress" name="waddress" rows="5" oninput="this.value = this.value.toUpperCase()" required></textarea>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ route('get.pendataan.biodata')}}" class="btn btn-primary">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">Kembali</span>
                                        </a>
                                        <div class="float-right">
                                        @if ($ss->status == 'NOT VERIFIED')
                                        <button type="submit" class="btn btn-success">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </button>
                                        @elseif ($ss->status == 'VERIFIED' || 'WAITING VERIFICATION' )
                                        <a href="{{ route('get.pendataan.pemberkasan')}}" class="btn btn-primary">
                                            <span class="text">Selanjutnya</span>
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                        @endif
                                        </div>
                                    </div>
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