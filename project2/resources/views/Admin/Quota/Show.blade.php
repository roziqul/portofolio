@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Kuota</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('utilities.kouta.update')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf                                        
                        @foreach ($value as $val)                                            
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kuota</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" value="{{$val->id}}" required>
                                <input type="text" class="form-control" name="quota" value="{{$val->quota}}" required>
                            </div>
                        </div>
                        @endforeach
                        <div class="card-footer">
                            <a href="{{ route('utilities.kuota')}}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection