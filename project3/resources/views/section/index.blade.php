@extends('master')

@section('content')

    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
        <section class="section">
            <div class="section-header">
                <h1>Section Collection</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Services</div>
                    <div class="breadcrumb-item">Catalog</div>
                    <div class="breadcrumb-item">Section Collection</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="text-align:right">
                                    <a href="{{ route('section.create') }}" class="btn btn-icon icon-left btn-primary"
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
                                                <th style="text-align: center">Section</th>
                                                <th style="text-align: center">Created Date</th>
                                                <th style="text-align: center">Updated At</th>
                                                <th style="text-align: center">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($section as $val)
                                                <tr>
                                                    <td style="text-align: center">{{ $no++ }}</td>
                                                    <td style="text-align: center">{{ $val->name }}</td>
                                                    <td style="text-align: center">{{ $val->created_at }}</td>
                                                    <td style="text-align: center">{{ $val->updated_at }}</td>
                                                    <td style="text-align: center">
                                                        <div class="d-inline-block">
                                                            <form action="#" method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn-sm btn-icon icon-center bg-transparent">
                                                                    <i class="fas fa-pen text-primary"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <button class="btn-sm btn-icon icon-center btn-primary">
                                                                <a href="{{ route('section.show', $val->id) }}"
                                                                    style="text-align: center">
                                                                    <i class="fas fa-search text-white icon-center">
                                                                    </i>
                                                                </a>
                                                            </button>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <form action="#" method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn-sm btn-icon icon-center btn-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
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
    @elseif (auth()->user()->role == 'student')
        <section class="section">
            <div class="section-header">
                <h1>Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No.</th>
                                                <th style="text-align: center">Section</th>
                                                <th style="text-align: center">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($section as $val)
                                                <tr>
                                                    <td style="text-align: center">{{ $no++ }}</td>
                                                    <td style="text-align: center">{{ $val->name }}</td>
                                                    <td style="text-align: center">
                                                        <form action="{{ route('studentSection.show') }}" method="post">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
