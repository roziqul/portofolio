@extends('master')

@section('content')

        <section class="section">
            <div class="section-header">
                <h1>Detail Kategori</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Status NOP</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-sm table-bordered">
                                    @foreach ($category as $val)
                                        <tbody>
                                            <tr>
                                                <th scope="row">Category</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">{{ $val->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Created At</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">{{ $val->created_at }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Last Updated</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">{{ $val->updated_at }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Verified By</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">
                                                    {{ $val->verified_by }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total Catalog</th>
                                                <td colspan="5" id="alamat_op" style="width: 70%;">{{ $count }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Title</th>
                                            <th style="text-align: center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catalog as $val)
                                            <tr>
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td>{{ $val->title }}</td>
                                                <td style="text-align: center">                                                                                                           
                                                    <div class="d-inline-block">
                                                        <button class="btn-sm btn-icon icon-center btn-primary">
                                                            <a href="{{route('catalog.show', $val->id)}}" style="text-align: center">
                                                                <i class="fas fa-search text-white icon-center">                                                            
                                                                </i>
                                                            </a>
                                                        </button>                                                      
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
        </section>    
    
@endsection
