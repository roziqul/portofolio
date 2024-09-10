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
                    <form action="{{ route('post.pendataan.payment')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf
                        @foreach ($fitur as $f)
                            @if ($f->status == 'NON ACTIVE')
                                <h3>Maaf, untuk saat ini fitur sedang tidak tersedia</h3>

                            @else
                                @foreach ($psb as $val)
                                @foreach ($siswa as $ss)
                                <h3>Pembayaran Program PSB</h3>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Referensi</label>
                                    <div class="col">
                                        @if ($val->noref != null && $ss->status == 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="noref" name="noref" value="{{$val->noref}}" required>
                                            @error('noref')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        @elseif ($val->noref != null && $ss->status != 'NOT VERIFIED')
                                            <input type="number" class="form-control" id="noref" name="noref" value="{{$val->noref}}" readonly>
                                        @elseif ($val->noref == null)
                                            <input type="number" class="form-control" id="noref" name="noref" value="" required>
                                            @error('noref')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 2%;">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Bukti Transfer Biaya PSB</label>
                                    @if ($val->bukti_tf != null && $ss->status == 'NOT VERIFIED')
                                        <div class="col">
                                            <input type="text" class="form-control" id="sR1" name="sR1" value="{{ $val->bukti_tf }}">
                                            <input type="file" class="form-control" id="eR1" name="bukti_tf" onchange="checkR1(this)" style="display: none">
                                            @error('bukti_tf')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            <small> *berkas yang diunggah berformat .jpg / .png</small>
                                        </div>
                                        <div class="col">
                                            <label for="eR1" name="bR1" class="btn btn-warning" style="margin-bottom: 0em">Edit Berkas</label>
                                        </div>
                                    @elseif ($val->bukti_tf != null && $ss->status != 'NOT VERIFIED')
                                        <div class="col">
                                            <input type="text" class="form-control" id="bukti_tf" name="bukti_tf" value="{{ $val->bukti_tf }}" readonly>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-primary" href="{{ asset('Berkas/TF_PSB/' . $val->bukti_tf)}}" target="_blank">Preview</a>
                                        </div>
                                    @elseif ($val->bukti_tf == null)
                                        <div class="col">
                                            <input type="file" class="form-control" id="bukti_tf" name="bukti_tf" required>
                                            @error('bukti_tf')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                            <small> *berkas yang diunggah berformat .jpg / .png</small>
                                        </div>
                                        <div class="col">
                                        </div>
                                    @endif
                                </div>
                            
                                <div class="card-footer">
                                    <a href="{{ route('get.pendataan.pemberkasan')}}" class="btn btn-primary">
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
                                        <a href="{{ route('get.pendataan.finalisasi')}}" class="btn btn-primary">
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