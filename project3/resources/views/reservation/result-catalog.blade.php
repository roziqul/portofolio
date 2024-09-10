@extends('master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Catalog</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
                <div class="breadcrumb-item">Status NOP</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Section</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            <a href="#">
                                                {{ $catalogDetail->section->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kategori</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            <a href="#">
                                                {{ $catalogDetail->category->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Judul</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">{{ $catalogDetail->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penyusun</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">{{ $catalogDetail->writer }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penerbit</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            {{ $catalogDetail->publisher }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tahun Terbit</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            {{ $catalogDetail->release_year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Harga Satuan</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">{{ $catalogDetail->price }}
                                        </td>
                                    </tr>
                                </tbody>
                                @if ($countAvailable != null)
                                <form action="{{ route('admin-reservation-update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" value="approved" name="status">
                                    <table class="table table-striped table-sm table-bordered" style="height: 20px">
                                        <tbody>
                                            <tr style="height: 10px">
                                                <th scope="row" style="vertical-align: center;">Nomor Seri</th>
                                                <td colspan="5" id="duration" style="width: 70%;">
                                                    <select class="form-control select2" name="serial_number" id="serial_number">
                                                        <option value="" selected disabled></option>
                                                        @foreach ($availableSerial as $val)
                                                            <option value="{{ $val->serial_number }}">{{ $val->serial_number }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="text-align: right">
                                        <button type="submit" class="btn btn-success">Konfirmasi Reservasi</button>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('admin-reservation-update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" id="rsvId" value="{{ $reservationId }}" name="rsvId">
                                    <input type="hidden" class="form-control" id="userId" value="{{ $studentId }}" name="userId">
                                    <table class="table table-striped table-sm table-bordered" style="height: 20px">
                                        <tbody>
                                            <tr style="height: 20px">
                                                <th scope="row" style="vertical-align: center;">Nomor Seri</th>
                                                <td colspan="5" id="duration" style="width: 70%;">
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="text-align: right">
                                        <button type="submit" class="btn btn-success">Batalkan</button>
                                    </div>
                                </form>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ $catalogDetail->cover }}" alt="cover buku" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
