@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Reservasi</h1>
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
                        <strong>
                            <h4>Detail Buku</h4>
                        </strong>
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Nomor Seri</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$serial->serial_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kategori</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$serial->catalog->category->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Judul</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$serial->catalog->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Penyusun</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$serial->catalog->writer}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Penerbit</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$serial->catalog->publisher}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Terbit</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$serial->catalog->release_year}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Harga Satuan</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">Rp. {{$serial->catalog->price}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <strong>
                            <h4>Informasi Peminjam</h4>
                        </strong>
                        <table class="table table-striped table-sm table-bordered mb-5">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Siswa</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$reserved->student->fullname}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelas</th>
                                    <td colspan="5" id="alamat_wp">{{$reserved->student->class}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat Siswa</th>
                                    <td colspan="5" id="alamat_wp">{{$reserved->student->address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Telepon Siswa</th>
                                    <td colspan="5" id="alamat_wp">{{$reserved->student->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Peminjaman</th>
                                    <td colspan="5" id="alamat_wp">{{$reserved->start_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Batas Peminjaman</th>
                                    <td colspan="5" id="alamat_wp">{{$reserved->due_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">
                                        @if ($reserved->rsv_status == 'finished')
                                            <div class="badge badge-success">Finished</div>
                                        @elseif ($reserved->rsv_status == 'not_finished')
                                            <div class="badge badge-danger">Not Finished</div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <form action="{{route('admin-reserved-submit')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" value="returned" name="condition">
                            <input type="hidden" class="form-control" value="{{$reserved->serial->serial_number}}" name="serial_number">
                            <input type="hidden" class="form-control" value="{{$reserved->student->email}}" name="email">
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-primary">Return</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <strong>
                            <h4>Cover Buku</h4>
                        </strong>
                        <img src="https://marketplace.canva.com/EAF57cpiHJw/1/0/1131w/canva-biru-oranye-modern-profesional-cover-modul-dokumen-a4-8UR5peyyTlA.jpg" alt="Girl in a jacket" style="width: 100%"> 
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection