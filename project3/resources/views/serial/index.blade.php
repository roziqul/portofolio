@extends('master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Serial Number</h1>
            <div class="section-header-breadcrumb">
                {{-- <div class="breadcrumb-item">Services</div>
                <div class="breadcrumb-item">Catalog</div>
                <div class="breadcrumb-item">Category Collection</div> --}}
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                                
                            @endif
                            <div style="text-align:right">
                                <a href="#" class="btn btn-icon icon-left btn-primary"
                                    style="margin-bottom: 10px; width:150px;">
                                    <i class="fas fa-plus"></i>
                                    Insert Data
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Serial Number</th>
                                            <th style="text-align: center">Responsible Student</th>
                                            <th style="text-align: center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($serial as $val)
                                            <tr>
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td style="text-align: center">{{ $val->serial_number }}</td>
                                                <td style="text-align: center">
                                                    @if ($val->student)
                                                        {{ $val->student->fullname }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($val->status == 'available')
                                                        <div class="badge badge-success">Available</div>
                                                    @elseif ($val->status == 'not_available')
                                                        <div class="badge badge-primary">Loaned</div>
                                                    @elseif ($val->status == 'missing')
                                                        <div class="badge badge-danger">Missing</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
