@extends('Admin.Master')
@section('Content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Pembayaran SPP</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="float-right">
                    <form action="{{ route('filterPayment') }}" method="GET" style="margin-bottom: 10px">
                        <input type="radio" name="filter" value="option1" id="option1">
                        <label for="option1" style="margin-right: 20px">All</label>

                        <input type="radio" name="filter" value="option2" id="option2">
                        <label for="option2" style="margin-right: 20px">Verified</label>
                        
                        <input type="radio" name="filter" value="option3" id="option3">
                        <label for="option3" style="margin-right: 20px">Waiting Verification</label>

                        <input type="radio" name="filter" value="option4" id="option4">
                        <label for="option4" style="margin-right: 20px">Not Verified</label>

                        <input type="radio" name="filter" value="option5" id="option5">
                        <label for="option5" style="margin-right: 20px">Rejected</label>
                                                            
                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </form>
                </div>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Nomor Peserta</th>
                            <th style="text-align: center;">Nama Siswa</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Verified By</th>
                            <th style="text-align: center;">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($value as $spp)
                        <tr>
                            <td style="text-align: center;">{{$no++}}</td> 
                            <td style="text-align: center;">{{$spp->siswa_id}}</td>
                            <td style="text-align: center;">{{$spp->Siswa->nama}}</td>
                            <td style="text-align: center;">
                                @if ($spp->status == 'WAITING VERIFICATION')
                                    <button class="btn btn-warning">WAITING VERIFICATION</button>
                                @elseif ($spp->status == 'VERIFIED')
                                    <button class="btn btn-success">VERIFIED</button>
                                @elseif ($spp->status == 'NOT VERIFIED')
                                    <button class="btn btn-danger">NOT VERIFIED</button>
                                @endif
                            </td>
                            <td style="text-align: center;">{{$spp->verified_by}}</td>
                            <td style="text-align: center;">
                                <a href="payment/{{$spp->siswa_id}}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search"></i>
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