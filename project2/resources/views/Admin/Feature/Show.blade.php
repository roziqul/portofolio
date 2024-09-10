@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Fitur</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('utilities.feature.update')}}" method="post" enctype="multipart/form-data" style="display: block;">
                        @csrf                                        
                        @foreach ($value as $val)                                            
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Fitur</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id" value="{{ $val->id }}" readonly>
                                <input type="text" class="form-control" name="fitur" value="{{ $val->fitur }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" value="{{$val->status}}" readonly>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('utilities.feature')}}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <div class="float-right">
                                @if ($val->status == 'NON ACTIVE')
                                <button type="submit" class="btn btn-success" name="status" value="ACTIVE">Aktifkan</button>
                                @else
                                <button type="submit" class="btn btn-danger" name="status" value="NON ACTIVE">Non Aktifkan</button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection