@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User Information</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Users</div>
            <div class="breadcrumb-item active"><a href="{{ route('administrator-data.index') }}">Administrator</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <table class="table table-striped table-sm table-bordered mb-5">
                                                    @foreach ($administrator as $val)
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">NIP</th>
                                                                <td colspan="5" id="nama_wp" style="width: 70%;">
                                                                    {{ $val->nip }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td colspan="5" id="alamat_wp">{{ $val->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Full Name</th>
                                                                <td colspan="5" id="nama_wp" style="width: 70%;">
                                                                    {{ $val->fullname }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Place / Date of Birth</th>
                                                                <td colspan="5" id="nama_wp" style="width: 70%;">
                                                                    {{ $val->pob }}, {{ $val->dob }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Gender</th>
                                                                <td colspan="5" id="alamat_wp">
                                                                    @if ($val->gender == 'L')
                                                                        <div class="badge badge-primary">Male</div>
                                                                    @else
                                                                        <div class="badge badge-primary"
                                                                            style="background-color: palevioletred">Female</div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Address</th>
                                                                <td colspan="5" id="alamat_wp">{{ $val->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Phone Number</th>
                                                                <td colspan="5" id="alamat_wp">{{ $val->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Status</th>
                                                                <td colspan="5" id="alamat_wp">
                                                                    @if ($status == 'active')
                                                                        <div class="badge badge-success">Active</div>
                                                                    @elseif ($status == 'nonactive')
                                                                        <div class="badge badge-warning">Inactive</div>
                                                                    @elseif ($status == 'unregistered')
                                                                        <div class="badge badge-danger">Not Registered</div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                                @if ($status == 'unregistered')                                                
                                                    <form action="{{ route('admin-activation') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @foreach ($administrator as $val)
                                                            <input type="hidden" class="form-control" value="register" name="condition">
                                                            <input type="hidden" class="form-control" value="{{ $val->fullname }}" name="name">
                                                            <input type="hidden" class="form-control" value="{{ $val->email }}" name="email">
                                                            <input type="hidden" class="form-control" value="{{ $val->nip }}" name="password">
                                                            <input type="hidden" class="form-control" value="admin" name="role">
                                                            <input type="hidden" class="form-control" value="active" name="status">
                                                        @endforeach
                                                            <div style="text-align: right">
                                                                <button type="submit" class="btn btn-icon icon-left btn-success">
                                                                    <i class="fa fa-check"></i>
                                                                    Activate Account
                                                                </button>
                                                            </div>
                                                    </form>
                                                @elseif ($status == 'active')
                                                    <form action="{{ route('admin-deactivation') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @foreach ($administrator as $val)
                                                            <input type="hidden" class="form-control" value="{{ $val->email }}" name="email">
                                                            <input type="hidden" class="form-control" value="nonactive" name="status">
                                                        @endforeach
                                                        <div style="text-align: right">
                                                            <button type="submit" href="{{ route('administrator-data.index') }}" class="btn btn-icon icon-left btn-danger">
                                                                <i class="fa fa-exclamation"></i>
                                                                Deactivate Account
                                                            </button>
                                                        </div>
                                                    </form>
                                                @elseif ($status == 'nonactive')
                                                    <form action="{{ route('admin-activation') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @foreach ($administrator as $val)
                                                            <input type="hidden" class="form-control" value="{{ $val->fullname }}" name="name">
                                                            <input type="hidden" class="form-control" value="{{ $val->nip }}" name="password">
                                                            <input type="hidden" class="form-control" value="admin" name="role">
                                                            <input type="hidden" class="form-control" value="reactivate" name="condition">
                                                            <input type="hidden" class="form-control" value="{{ $val->email }}" name="email">
                                                            <input type="hidden" class="form-control" value="active" name="status">
                                                        @endforeach
                                                        <div style="text-align: right">
                                                            <button type="submit" href="{{ route('administrator-data.index') }}" class="btn btn-icon icon-left btn-success">
                                                                <i class="fa fa-check"></i>
                                                                Activate Account
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif
                                                
                                            </div>
                                            <div class="col-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="{{ $val->photo }}" alt="Foto Admin" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection