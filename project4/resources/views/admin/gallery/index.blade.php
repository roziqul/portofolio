@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Galeri</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <div>
                                <button type="button" onclick="window.location.href='{{route('gallery.create')}}'" class="btn btn-icon icon-left btn-primary mb-3">
                                    <i class="fas fa-plus mx-1"></i>
                                    Tambah Galeri
                                </button>
                            </div>
                        </div>   
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%">No</th>
                                        <th class="text-center">Dokumentasi</th>
                                        <th class="text-center">Destinasi</th>
                                        <th class="text-center" style="width: 25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galeries as $g)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="text-center">
                                            <img src="{{asset('storage/' . $g->photo)}}" alt="Foto Galeri" style="width: 200px; height: 200px">
                                        </td>
                                        <td class="text-center">
                                            {{ $g->SubDestination->name }}
                                        </td>
                                        <td style="text-align: center">
                                            <div class="d-inline-block">
                                                <form action="{{ route('gallery.destroy', $g->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm btn-icon icon-center btn-danger">
                                                        <i class="fas fa-trash text-white icon-center"></i>
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
@endsection
