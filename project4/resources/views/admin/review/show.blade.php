@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Ulasan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Dokumentasi</h4>
                        <img src="{{ filter_var($review->documentation, FILTER_VALIDATE_URL) ? $review->documentation : asset('storage/' . $review->documentation) }}" alt="Dokumentasi" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Foto Customer</h4>
                        <img src="{{ filter_var($review->photo_customer, FILTER_VALIDATE_URL) ? $review->photo_customer : asset('storage/' . $review->photo_customer) }}" alt="Foto Customer" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Customer</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$review->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Subdestinasi</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$review->subDestination->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ulasan</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$review->review}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <div>
                                <button type="button" onclick="window.location.href='{{route('review.index')}}'" class="btn btn-icon icon-left btn-primary mb-3">
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
