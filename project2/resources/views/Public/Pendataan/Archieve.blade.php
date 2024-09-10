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
                    <form action="{{ route('post.pendataan.pemberkasan')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>

                            @else
                                @foreach ($siswa as $ss)
                                    @foreach ($archieve as $val)
                                    <h3>Pemberkasan</h3>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Foto 3x4 Siswa</label>
                                        @if ($val->foto != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR7" name="sR7" value="{{ $val->foto }}">
                                                <input type="file" class="form-control" id="eR7" name="foto" onchange="checkR7(this)" style="display: none">
                                                @error('foto')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .jpg / .png</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR7" name="bR7" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->foto != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="foto" name="foto" value="{{ $val->foto }}" readonly>
                                                <small> *berkas yang diunggah berformat .jpg / .png</small>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Foto/' . $val->foto)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->foto == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="foto" name="foto" accept="application/jpg " required>
                                                @error('foto')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .jpg / .png</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Kartu Keluarga</label>
                                        @if ($val->kk != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR8" name="sR8" value="{{ $val->kk }}">
                                                <input type="file" class="form-control" id="eR8" name="kk" onchange="checkR8(this)" accept="application/pdf" style="display: none">
                                                @error('kk')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR8" name="bR8" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->kk != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="kk" name="kk" value="{{ $val->kk }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/KK/' . $val->kk)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->kk == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="kk" name="kk" accept="application/pdf" required>
                                                @error('kk')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Akta Kelahiran</label>
                                        @if ($val->akta != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR9" name="sR9" value="{{ $val->akta }}">
                                                <input type="file" class="form-control" id="eR9" name="akta" onchange="checkR9(this)" accept="application/pdf" style="display: none">
                                                @error('akta')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR9" name="bR9" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->akta != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="akta" name="akta" value="{{ $val->akta }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Akta/' . $val->akta)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->akta == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="akta" name="akta" accept="application/pdf" required>
                                                @error('akta')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan NISN</label>
                                        @if ($val->nisn != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR10" name="sR10" value="{{ $val->nisn }}">
                                                <input type="file" class="form-control" id="eR10" name="nisn" onchange="checkR10(this)" accept="application/pdf" style="display: none">
                                                @error('nisn')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR10" name="bR10" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->nisn != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $val->nisn }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/NISN/' . $val->nisn)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->nisn == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="nisn" name="nisn" accept="application/pdf" required>
                                                @error('nisn')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 1</label>
                                        @if ($val->raport1 != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR1" name="sR1" value="{{ $val->raport1 }}">
                                                <input type="file" class="form-control" id="eR1" name="raport1" onchange="checkR1(this)" accept="application/pdf" style="display: none">
                                                @error('raport1')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR1" name="bR1" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->raport1 != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="raport1" name="raport1" value="{{ $val->raport1 }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Raport/Semester I/' . $val->raport1)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->raport1 == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="raport1" name="raport1" accept="application/pdf" required>
                                                @error('raport1')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 2</label>
                                        @if ($val->raport2 != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR2" name="sR2" value="{{ $val->raport2 }}">
                                                <input type="file" class="form-control" id="eR2" name="raport2" onchange="checkR2(this)" accept="application/pdf" style="display: none">
                                                @error('raport2')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR2" name="bR2" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->raport2 != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="raport2" name="raport2" value="{{ $val->raport2 }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Raport/Semester II/' . $val->raport2)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->raport2 == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="raport2" name="raport2" accept="application/pdf" required>
                                                @error('raport2')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 3</label>
                                        @if ($val->raport3 != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR3" name="sR3" value="{{ $val->raport3 }}">
                                                <input type="file" class="form-control" id="eR3" name="raport3" onchange="checkR3(this)" accept="application/pdf" style="display: none">
                                                @error('raport3')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR3" name="bR3" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->raport3 != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="raport3" name="raport3" value="{{ $val->raport3 }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Raport/Semester III/' . $val->raport3)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->raport3 == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="raport3" name="raport3" accept="application/pdf" required>
                                                @error('raport3')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 4</label>
                                        @if ($val->raport4 != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR4" name="sR4" value="{{ $val->raport4 }}">
                                                <input type="file" class="form-control" id="eR4" name="raport4" onchange="checkR4(this)" accept="application/pdf" style="display: none">
                                                @error('raport4')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR4" name="bR4" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->raport4 != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="raport4" name="raport4" value="{{ $val->raport4 }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Raport/Semester IV/' . $val->raport4)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->raport4 == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="raport4" name="raport4" accept="application/pdf" required>
                                                @error('raport4')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Raport Semester 5</label>
                                        @if ($val->raport5 != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR5" name="sR5" value="{{ $val->raport5 }}">
                                                <input type="file" class="form-control" id="eR5" name="raport5" onchange="checkR5(this)" accept="application/pdf" style="display: none">
                                                @error('raport5')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR5" name="bR5" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->raport5 != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="raport5" name="raport5" value="{{ $val->raport5 }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/Raport/Semester V/' . $val->raport5)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->raport5 == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="raport5" name="raport5" accept="application/pdf" required>
                                                @error('raport5')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row" style="margin-bottom: 2%;">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Scan Surat Keterangan Lulus</label>
                                        @if ($val->skl != null && $ss->status == 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="sR6" name="sR6" value="{{ $val->skl }}">
                                                <input type="file" class="form-control" id="eR6" name="skl" onchange="checkSKL(this)" accept="application/pdf" style="display: none">
                                                @error('skl')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                            <div class="col">
                                                <label for="eR6" name="bR6" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                            </div>
                                        @elseif ($val->skl != null && $ss->status != 'NOT VERIFIED')
                                            <div class="col">
                                                <input type="text" class="form-control" id="skl" name="skl" value="{{ $val->skl }}" readonly>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-primary" href="{{ asset('storage/Berkas/SKL/' . $val->skl)}}" target="_blank">Preview</a>
                                            </div>
                                        @elseif ($val->skl == null)
                                            <div class="col">
                                                <input type="file" class="form-control" id="skl" name="skl" accept="application/pdf" required>
                                                @error('skl')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <small> *berkas yang diunggah berformat .pdf</small>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="card-footer">
                                        <a href="{{ route('get.pendataan.ortu')}}" class="btn btn-primary">
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
                                            @elseif ($ss->status == 'VERIFIED' || 'WAITING VERIFICATION')
                                            <a href="{{ route('get.pendataan.payment')}}" class="btn btn-primary">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="text">Selanjutnya</span>
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