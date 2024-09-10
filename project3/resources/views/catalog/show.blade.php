@extends('master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Book Information</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Services</div>
                <div class="breadcrumb-item">Catalog</div>
                <div class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Book Collection</a></div>
                <div class="breadcrumb-item">Detail</div>
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
                                        <th scope="row">Category</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            <a href="#">
                                                {{ $catalogDetail->category->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            {{ $catalogDetail->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Writer</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            {{ $catalogDetail->writer }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Publisher</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            {{ $catalogDetail->publisher }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Release Year</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            {{ $catalogDetail->release_year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Retail Price</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            Rp. {{ $catalogDetail->price }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Available - Ready in stock</th>
                                        <td colspan="5" id="alamat_op" style="width: 70%;">
                                            @if ( $availableSerialNumber == '0')
                                                <div class="badge badge-danger">{{ $availableSerialNumber }} items</div>
                                                <p class="text-muted" style="display: inline-block">sorry, this book is currently unavailable.</p>
                                            @else
                                                <div class="badge badge-success">{{ $availableSerialNumber }} items</div>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')

                                <form action="{{route ('serial.index')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="catalog_id" value="{{$catalogDetail->id}}">
                                    <div style="text-align: right">
                                        <button type="submit" class="btn btn-primary">Serial Number</button>
                                    </div>
                                </form>

                            @elseif (auth()->user()->role == 'student')
                                
                                <form action="{{route('student-store-reservation')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" id="catalog_id" value="{{ $catalogDetail->id }}" name="catalog_id">
                                    <table class="table table-striped table-sm table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Durasi Peminjaman</th>
                                                <td colspan="5" id="duration" style="width: 70%;">
                                                    <select name="duration">
                                                        <option selected disabled>dalam bulan</option>
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
                                        <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
                                    </div>
                                </form>

                            @endif
                            
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
