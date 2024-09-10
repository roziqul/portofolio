@extends('master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Services</div>
                <div class="breadcrumb-item">Catalog</div>
                <div class="breadcrumb-item">Category</div>
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
                                <a href="{{ route('category.create') }}" class="btn btn-icon icon-left btn-primary"
                                    style="margin-bottom: 10px; width:100px;">
                                    <i class="fas fa-plus"></i>
                                    Insert
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Category</th>
                                            <th style="text-align: center">Created Date</th>
                                            <th style="text-align: center">Updated At</th>
                                            <th style="text-align: center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $val)
                                            <tr>
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td style="text-align: center">{{ $val->name }}</td>
                                                <td style="text-align: center">{{ $val->created_at }}</td>
                                                <td style="text-align: center">{{ $val->updated_at }}</td>
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
                                                            <a href="{{route('category.show', $val->id)}}" style="text-align: center">
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
