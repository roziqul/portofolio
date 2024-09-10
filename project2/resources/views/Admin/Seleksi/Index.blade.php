@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Seleksi Siswa</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="float-right">
                <form action="{{ route('filterSeleksi') }}" method="GET" style="margin-bottom: 10px">
                    <input type="radio" name="filter" value="option1" id="option" checked>
                    <label for="option1" style="margin-right: 20px">All</label>
                    
                    <input type="radio" name="filter" value="option2" id="option">
                    <label for="option2" style="margin-right: 20px">Not Verified</label>
    
                    <input type="radio" name="filter" value="option3" id="option">
                    <label for="option3" style="margin-right: 20px">Waiting Verification</label>
    
                    <input type="radio" name="filter" value="option4" id="option">
                    <label for="option3" style="margin-right: 20px">Verified</label>
                                                        
                    <button type="submit" class="btn btn-primary" id="applyBtn">Apply Filter</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nomor Peserta</th>
                            <th style="text-align: center;">Nama Siswa</th>
                            <th style="text-align: center;">Asal Sekolah</th>
                            <th style="text-align: center;">Poin</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Detail</th>
                            <th style="text-align: center;">Verified By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filteredData as $val)  
                        <tr>
                            <td style="text-align: center;">{{$no++}}</td>
                            <td style="text-align: center;">{{$val->id}}</td>
                            <td>{{$val->Siswa->nama}}</td>
                            <td>{{$val->Siswa->schorigin}}</td>
                            <td style="text-align: center;">{{$val->updated_at}}</td>
                            <td style="text-align: center;">
                                @if ($val->status == 'NOT VERIFIED')
                                    <button class="btn btn-danger">NOT VERIFIED</button>
                                @elseif ($val->status == 'WAITING VERIFICATION')
                                    <button class="btn btn-warning">WAITING VERIFICATION</button>
                                @elseif ($val->status == 'VERIFIED')
                                    <button class="btn btn-success">VERIFIED</button>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="seleksi/{{$val->id}}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                @if ($val->verified_by == null)
                                    <span class="text">-</span>
                                @elseif ($val->verified_by != null)
                                    <span class="text">{{$val->verified_by}}</span>
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


@endsection