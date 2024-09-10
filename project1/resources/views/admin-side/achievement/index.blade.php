@extends('admin-side.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Prestasi</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <div>
                                <button type="button" onclick="window.location.href='{{route('achievement.create')}}'" class="btn btn-icon icon-left btn-primary mb-3">
                                    <i class="fas fa-pen mx-1"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>   
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center" style="width: 80%">Nama Perlombaan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($achievements as $a)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="text-left">
                                            {{ $a->title }}
                                        </td>
                                        <td style="text-align: center">
                                            <div class="d-inline-block">
                                                <button type="button" onclick="window.location.href='{{ route('achievement.show', $a->id) }}'" class="btn-sm btn-icon icon-center btn-success">
                                                    <i class="fas fa-eye text-white icon-center"></i>
                                                </button>                                                
                                            </div>
                                            <div class="d-inline-block">
                                                <button type="button" onclick="window.location.href='{{ route('achievement.edit', $a->id) }}'" class="btn-sm btn-icon icon-center btn-primary">
                                                    <i class="fas fa-pen text-white icon-center"></i>
                                                </button>
                                            </div>
                                            <div class="d-inline-block">
                                                <form action="{{ route('achievement.destroy', $a->id) }}" method="POST" style="display:inline;">
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
