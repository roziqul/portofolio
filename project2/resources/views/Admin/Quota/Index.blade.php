@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Kuota Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Kapasitas</th>
                            <th style="text-align: center;">Updated By</th>
                            <th style="text-align: center;">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($value as $val)
                        <tr>
                            <td style="text-align: center;">{{$val->quota}}</td>
                            <td style="text-align: center;">{{$val->updated_by}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('utilities.kuota.edit',$val->id)}}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection