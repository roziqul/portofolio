@extends('master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Book Collection</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Services</div>
                <div class="breadcrumb-item">Catalog</div>
                <div class="breadcrumb-item active">Book Collection</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                            <div style="text-align:right">
                                <a href="{{ route('catalog.create') }}" class="btn btn-icon icon-left btn-primary"
                                    style="margin-bottom: 10px; width:100px;">
                                    <i class="fas fa-plus"></i>
                                    Insert
                                </a>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Section</th>
                                            <th style="text-align: center">Category</th>
                                            <th style="text-align: center">Title</th>
                                            <th style="text-align: center">Writer</th>
                                            <th style="text-align: center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catalog as $val)
                                            <tr>
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td style="text-align: center">
                                                    @if ($val->section)
                                                        {{ $val->section->name }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($val->section)
                                                        {{ $val->category->name }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $val->title }}</td>
                                                <td>{{ $val->writer }}</td>
                                                <td style="text-align: center">
                                                    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                                                    <div class="d-inline-block">
                                                        <form action="#" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn-sm btn-icon icon-center bg-transparent">
                                                                <i class="fas fa-pen text-primary"></i>
                                                            </button>
                                                        </form>
                                                    </div> 
                                                    @endif                                                                                                   
                                                    <div class="d-inline-block">
                                                        <button class="btn-sm btn-icon icon-center btn-primary">
                                                            <a href="{{route('catalog.show', $val->id)}}" style="text-align: center">
                                                                <i class="fas fa-search text-white icon-center">                                                            
                                                                </i>
                                                            </a>
                                                        </button>                                                      
                                                    </div>
                                                    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                                                    <div class="d-inline-block">
                                                        <form action="#" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn-sm btn-icon icon-center btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
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