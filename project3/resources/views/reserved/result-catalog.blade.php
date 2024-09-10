@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Book Lending Confirmation</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Services</div>
            <div class="breadcrumb-item">Book Lending</div>
            <div class="breadcrumb-item">Confirmation</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-9">
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
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $student->photo }}" alt="Foto siswa" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
        @if ($rsvcount != null)
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
                                <th style="text-align: center">Serial Number</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Start Date</th>
                                <th style="text-align: center">Due Date</th>
                                <th style="text-align: center">Menu</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($reserved as $val)
                            <tr>
                                <td style="text-align: center">
                                    @if ($val->catalog)
                                        {{$val->catalog->section->name}}
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($val->catalog)
                                        {{$val->catalog->category->name}}
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($val->catalog)
                                        {{$val->catalog->serial_number}}
                                    @endif
                                </td>
                                <td>
                                    @if ($val->catalog)
                                        {{$val->catalog->title}}
                                    @endif
                                </td>
                                <td>{{$val->start_date}}</td>
                                <td>{{$val->due_date}}</td>
                                <td style="text-align: center"><a href="{{route('catalog.index')}}" class="btn btn-danger">Batalkan</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
                    <div style="text-align: right">
                        <a href="{{route('admin-reserved-submit')}}" class="btn btn-icon icon-left btn-success">
                            <i class="fa fa-save"></i>
                            Simpan
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="empty-state" data-height="400">
                    <div class="empty-state-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h2>Input Nomor Seri Buku</h2>
                    <p class="lead">
                        <form action="{{route('admin-reserved-result-catalog')}}" method="post" id="formTambah" enctype=multipart/form-data class="form-inline mb-4">
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
    </div>
</section>
@endsection