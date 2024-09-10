@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Slider</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ filter_var($slider->photo, FILTER_VALIDATE_URL) ? $slider->photo : asset('storage/' . $slider->photo) }}" alt="Dokumentasi" style="width: 100%">
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
                                    <th scope="row">Judul Slider</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$slider->title}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <div>
                                <button type="button" onclick="window.location.href='{{route('slider.index')}}'" class="btn btn-icon icon-left btn-primary mb-3">
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
