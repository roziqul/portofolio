@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('users.create')}}" class="btn btn-primary" style="margin-bottom: 2%">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create New Admin</span>
                </a>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Username</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Created At</th>
                            <th style="text-align: center;">Updated By</th>
                            <th style="text-align: center;">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($value as $val)
                        <tr>
                            <td style="text-align: center;">{{$val->id}}</td>
                            <td style="text-align: center;">{{$val->name}}</td>
                            <td style="text-align: center;">{{$val->email}}</td>
                            <td style="text-align: center;">{{$val->created_at}}</td>
                            <td style="text-align: center;">{{$val->updated_by}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('users.show',$val->id)}}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <span class="text">Edit</span>
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