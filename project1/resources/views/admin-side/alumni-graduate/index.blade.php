@extends('admin-side.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Prestasi Siswa</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Dokumentasi</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($achievements as $a)
                                    <tr>
                                        <td class="text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ $a->photo }}" alt="Foto Dokumentasi" style="max-width: 30%">
                                        </td>
                                        <td class="text-left">
                                            {{ $a->title }}
                                        </td>
                                        <td class="text-left">
                                            {{ $a->year }}
                                        </td>
                                        <td class="text-left">
                                            {{ $a->student_name }}
                                        </td>
                                        <td style="text-align: center">
                                            <div class="d-inline-block">
                                                <a type="button" href="{{route('achievement.show')}}" class="btn-sm btn-icon icon-center btn-success">
                                                    <i class="fas fa-eye text-white icon-center"></i>
                                                </a>
                                            </div>
                                            <div class="d-inline-block">
                                                <a type="button" href="{{route('achievement.edit', $a->id)}}" class="btn-sm btn-icon icon-center btn-primary">
                                                    <i class="fas fa-search text-white icon-center"></i>
                                                </a>
                                            </div>
                                            <div class="d-inline-block">
                                                <a type="button" href="{{route('achievement.destroy', $a->id)}}" class="btn-sm btn-icon icon-center btn-danger">
                                                    <i class="fas fa-trash text-white icon-center"></i>
                                                </a>
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
