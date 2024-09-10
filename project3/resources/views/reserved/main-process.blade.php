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
                                    @if ($val->serial)
                                        {{$val->serial->catalog->section->name}}
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($val->serial)
                                        {{$val->serial->catalog->category->name}}
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($val->serial)
                                        {{$val->serial->serial_number}}
                                    @endif
                                </td>
                                <td>
                                    @if ($val->serial)
                                        {{$val->serial->catalog->title}}
                                    @endif
                                </td>
                                <td style="text-align: center">{{$val->start_date}}</td>
                                <td style="text-align: center">{{$val->due_date}}</td>
                                <td style="text-align: center">
                                    <form action="{{route('admin-reserved-cancel')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{$val->serial_id}}" name="serial_id">
                                        <input type="hidden" class="form-control" value="{{$val->id}}" name="reserved_id">
                                        <div style="text-align: right">
                                            <button type="submit" class="btn btn-icon icon-left btn-danger">
                                                <i class="fa fa-times-circle"></i>
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
                    <div style="text-align: right">
                        <a href="{{route('admin-reserved-submit')}}" class="btn btn-icon icon-left btn-success">
                            <i class="fa fa-save"></i>
                            Save
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
                            <tbody>
                                <tr>
                                    <th scope="row">Serial Number</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->serial_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Section / Category</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->catalog->section->name}} / {{$catalog->catalog->category->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Title</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->catalog->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Writer</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->catalog->writer}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Publisher</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->catalog->publisher}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Release Year</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->catalog->release_year}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Retail Price</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">{{$catalog->catalog->price}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">
                                        @if ($catalog->status == 'available')
                                            <div class="badge badge-success">Available</div>
                                        @elseif ($catalog->status == 'not_available')
                                            <div class="badge badge-warning">Not Available</div>
                                        @elseif ($catalog->status == 'missing')
                                            <div class="badge badge-danger">Missing</div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($catalog->status == 'available')     
                        <form action="{{route('admin-reserved-submit')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" value="lended" name="condition">
                            <input type="hidden" class="form-control" value="{{$catalog->serial_number}}" name="serial_number">
                            <input type="hidden" class="form-control" value="{{$student->email}}" name="email">
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
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-icon icon-left btn-success">
                                    <i class="fa fa-arrow-circle-up"></i>
                                    Approve
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <strong>
                            <h4>Cover Buku</h4>
                        </strong>
                        <img src="{{$catalog->catalog->cover}}" alt="cover buku" style="width: 100%">     
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection