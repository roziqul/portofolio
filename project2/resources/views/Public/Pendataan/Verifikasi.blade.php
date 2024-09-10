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
                    <form action="{{ route('post.pendataan.verifikasi')}}" method="post" enctype="multipart/form-data" style="display: block;">
                    @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>

                            @else                              
                                @foreach ($siswa as $val)
                                <h3>Verifikasi Data Siswa</h3>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        @if ($val->nama != null && $val->status == 'NOT VERIFIED')
                                        <input type="text" class="form-control" name="nama" id="nama" value="{{$val->nama}}" oninput="this.value = this.value.toUpperCase()" required>
                                        @error('nama')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        @elseif ($val->nama != null && $val->status != 'NOT VERIFIED')
                                        <input type="text" class="form-control" name="nama" value="{{$val->nama}}" readonly>
                                        @elseif ($val->nama == null)
                                        <input type="text" class="form-control" name="nama" id="nama" value="" oninput="this.value = this.value.toUpperCase()" required>
                                        @error('nama')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">NISN</label>
                                    <div class="col-sm-10">
                                        @if ($val->nisn != null && $val->status == 'NOT VERIFIED')
                                        <input type="number" class="form-control" name="nisn" id="nisn" value="{{$val->nisn}}" required>
                                        @error('nisn')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        @elseif($val->nisn != null && $val->status != 'NOT VERIFIED')
                                        <input type="number" class="form-control" name="nisn" value="{{$val->nisn}}" readonly>
                                        @elseif($val->nisn == null)
                                        <input type="number" class="form-control" name="nisn" id="nisn" value="" required>
                                        @error('nisn')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 2%;">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Asal Sekolah</label>
                                    <div class="col-sm-10">
                                        @if ($val->schorigin != null && $val->status == 'NOT VERIFIED')
                                        <input type="text" class="form-control" name="schorigin" value="{{$val->schorigin}}" oninput="this.value = this.value.toUpperCase()" required>
                                        @elseif($val->schorigin != null && $val->status != 'NOT VERIFIED')
                                        <input type="text" class="form-control" name="schorigin" value="{{$val->schorigin}}" readonly>
                                        @elseif($val->schorigin == null)
                                        <input type="text" class="form-control" name="schorigin" value="" oninput="this.value = this.value.toUpperCase()" required>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="card-footer">
                                    @if ($val->status == 'NOT VERIFIED')
                                    <button type="submit" class="btn btn-success">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Simpan</span>
                                    </button>
                                    @elseif ($val->status == 'VERIFIED' || 'WAITING VERIFICATION')
                                    <a href="{{ route('get.pendataan.biodata')}}" class="btn btn-primary">
                                        <span class="text">Selanjutnya</span>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </a>
                                    @endif
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
