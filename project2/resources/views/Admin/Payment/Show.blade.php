@extends('Admin.Master')
@section('Content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Ulang Siswa</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('post.payment')}}" method="post" enctype="multipart/form-data" style="display: block;">
                    @csrf
                    @foreach ($spp as $val)
                    <h3>Pembayaran Daftar Ulang</h3>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Referensi</label>
                        <div class="col">
                            <input type="hidden" class="form-control" id="siswa_id" name="siswa_id" value="{{$val->siswa_id}}" readonly>
                            <input type="text" class="form-control" id="noref" name="noref" value="{{$val->noref}}" readonly>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 2%;">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Bukti Transfer Daftar Ulang</label>
                        <div class="col">
                            <input type="text" class="form-control" id="bukti_tf" name="bukti_tf" value="{{ $val->bukti_tf }}" readonly>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="{{ asset($val->bukti_tf)}}" target="_blank">Preview</a>
                        </div>
                    </div>
                
                    <div class="card-footer">
                        <a href="{{ route('filterPayment')}}" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <div class="float-right">
                            @if ($val->noref == null)
                            <button type="submit" class="btn btn-danger" name="statusPayment" value="0">REJECT</button>
                            @elseif ($val->status == 'WAITING VERIFICATION')
                            <button type="submit" class="btn btn-danger" name="statusPayment" value="0">REJECT</button>
                            <button type="submit" class="btn btn-warning" name="statusPayment" value="1">NOT VERIFIED</button>
                            <button type="submit" class="btn btn-success" name="statusPayment" value="2">VERIFIED</button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection