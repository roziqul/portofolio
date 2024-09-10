@extends('master')

@section('content')

    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
        <section class="section">
            <div class="section-header">
                <h1>Peminjaman Buku</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Status serial_number</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <strong>
                                    <h4>Student Information</h4>
                                </strong>
                                <table class="table table-striped table-sm table-bordered mb-5">
                                    <tbody>
                                        <tr>
                                            <th scope="row">NISN / Email</th>
                                            <td colspan="5" id="nama_wp" style="width: 70%;">{{$student->nisn}} / {{$student->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Class</th>
                                            <td colspan="5" id="nama_wp" style="width: 70%;">{{$student->class}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <td colspan="5" id="nama_wp" style="width: 70%;">{{$student->fullname}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Place / Date of Birth</th>
                                            <td colspan="5" id="nama_wp" style="width: 70%;">{{$student->pob}}, {{$student->dob}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender</th>
                                            <td colspan="5" id="alamat_wp">
                                                @if ($student->gender == 'L')
                                                    <div class="badge badge-primary">Male</div>
                                                @else
                                                    <div class="badge badge-primary" style="background-color: palevioletred">Female</div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td colspan="5" id="alamat_wp">{{$student->address}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone Number</th>
                                            <td colspan="5" id="alamat_wp">{{$student->phone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">Section</th>
                                                <th style="text-align: center">Category</th>
                                                <th style="text-align: center">Judul</th>
                                                <th style="text-align: center">Durasi</th>
                                                <th style="text-align: center">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservation as $val)
                                                <tr>
                                                    <td style="text-align: center">
                                                        {{ $val->catalog->section->name }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $val->catalog->category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $val->catalog->title }}
                                                    </td>
                                                    <td>{{$val->duration}}</td>
                                                    <td style="text-align: center">
                                                        <form action="{{ route('admin-reservation-detail') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" id="id" value="{{ $val->id }}">
                                                            <button type="submit" class="btn btn-icon icon-left btn-primary">
                                                                <i class="fas fa-search"></i>
                                                                Detail
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($reserved as $val)
                                                <tr>
                                                    <td style="text-align: center">
                                                        {{ $val->catalog->section->name }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $val->catalog->category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $val->catalog->title }}
                                                    </td>
                                                    <td>{{ $val->start_date }}</td>
                                                    <td>{{ $val->due_date }}</td>
                                                    <td style="text-align: center">
                                                        <form action="{{ route('loan-detail') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" id="id"
                                                                value="{{ $val->id }}">
                                                            <button type="submit"
                                                                class="btn btn-icon icon-left btn-primary">
                                                                <i class="fas fa-search"></i>
                                                                Detail
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="text-align: right">
                                        <a href="{{ route('admin-reservation-index') }}" class="btn btn-icon icon-left btn-success">
                                            <i class="fa fa-save"></i>
                                            Simpan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="empty-state" data-height="400">
                    <div class="empty-state-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h2>Input Nomor Seri Buku</h2>
                    <p class="lead">
                        <form action="{{route('loan.result-serial')}}" method="post" id="formTambah" enctype=multipart/form-data class="form-inline mb-4">
                            @csrf
                            <div class="input-group mb-2" style="width: 100%;">
                                <div class="form-inline" style="display: block">
                                    <input type="number" name="serial_number" id="serial_number" class="form-control" title="serial_number" placeholder="Masukkan nomor seri" style="width: 300px;">
                                </div>
                                <div class="form-inline ml-2">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                                        <i class="fa fa-search"></i>
                                        Cari Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </p>
                </div>
                </div>
            </div>
        </div>
        </div>
        @if ($catalog != null)
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <strong>
                            <h4>Detail Buku</h4>
                        </strong>
                        <table class="table table-striped table-sm table-bordered">
                            @foreach ($catalog as $val)
                            <tbody>
                                <tr>
                                    <th scope="row">Nomor Seri</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->serial_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kategori</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->category->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Judul</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Penyusun</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->writer}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Penerbit</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->publisher}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Terbit</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->release_year}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Harga Satuan</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$val->price}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <form action="{{route('loan.submit')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($catalog as $book)
                            <input type="hidden" class="form-control" value="{{$book->id}}" name="serial_number">
                            @foreach ($student as $user)
                            <input type="hidden" class="form-control" value="{{$user->id}}" name="nisn">
                            @endforeach
                            <table class="table table-striped table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Loan Duration</th>
                                        <td colspan="5" id="duration" style="width: 70%;">
                                            <select name="duration">
                                                <option selected disabled>in months</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-icon icon-left btn-primary">
                                    <i class="fa fa-arrow-circle-up"></i>
                                    Tambahkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <strong>
                            <h4>Cover Buku</h4>
                        </strong>
                        @foreach ($catalog as $val)
                        <img src="{{$val->cover}}" alt="cover buku" style="width: 100%">     
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        </div> --}}
        </section>
    @elseif (auth()->user()->role == 'student')
        <section class="section">
            <div class="section-header">
                <h1>Riwayat Reservasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Status NOP</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                @foreach ($reserved as $val)
                                    <strong>
                                        <h4>Detail Buku</h4>
                                    </strong>
                                    <table class="table table-striped table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nomor Seri</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->catalog->serial_number }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kategori</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->catalog->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Judul</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->catalog->title }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Penyusun</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->catalog->writer }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Penerbit</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->catalog->publisher }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun Terbit</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->catalog->release_year }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Harga Satuan</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">Rp.
                                                    {{ $val->catalog->price }}</td>
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
                                                <td colspan="5" id="nama_wp" style="width: 70%;">
                                                    {{ $val->student->fullname }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelas</th>
                                                <td colspan="5" id="alamat_wp">{{ $val->student->class }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat Siswa</th>
                                                <td colspan="5" id="alamat_wp">{{ $val->student->address }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nomor Telepon Siswa</th>
                                                <td colspan="5" id="alamat_wp">{{ $val->student->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Peminjaman</th>
                                                <td colspan="5" id="alamat_wp">{{ $val->loan_started }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Batas Peminjaman</th>
                                                <td colspan="5" id="alamat_wp">{{ $val->loan_finished }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td colspan="5" id="alamat_wp">{{ $val->rsv_status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <strong>
                                    <h4>Cover Buku</h4>
                                </strong>
                                <img src="https://marketplace.canva.com/EAF57cpiHJw/1/0/1131w/canva-biru-oranye-modern-profesional-cover-modul-dokumen-a4-8UR5peyyTlA.jpg"
                                    alt="Girl in a jacket" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
