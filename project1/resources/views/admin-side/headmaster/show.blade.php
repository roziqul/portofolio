@extends('admin-side.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Prestasi Siswa</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body"> 
                        <img src="{{ $a->photo }}" alt="Dokumentasi" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm table-bordered mb-5">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Perlombaan</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$a->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$a->year}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Siswa / Perwakilan</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$a->student_name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
