@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Destinasi</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Destinasi</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$maindestination->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Dibuat</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$maindestination->created_at}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Subdestinasi</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">
                                        @if($maindestination->subDestinations->isNotEmpty())
                                            <ul>
                                                @foreach($maindestination->subDestinations as $subDestination)
                                                    <li>{{ $subDestination->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>Subdestinasi tidak ditemukan.</p>
                                        @endif
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="text-right">
                            <div>
                                <button type="button" onclick="window.location.href='{{route('maindestination.index')}}'" class="btn btn-icon icon-left btn-primary mb-3">
                                    <i class="fas fa-undo mx-1"></i>
                                    Kembali
                                </button>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
