@extends('master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Empty State</div>
            </div>
        </div>

        <div class="section-body">

        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Book Submission</h4>
                </div>
                <div class="card-body">
                <div class="empty-state" data-height="400">
                    <div class="empty-state-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h2>Insert Book Serial Number</h2>
                    <p class="lead">
                        <form action="{{route('admin-reserved-result')}}" method="post" id="formTambah" enctype=multipart/form-data class="form-inline mb-4">
                            @csrf
                            <div class="input-group mb-2" style="width: 100%;">
                                <div class="form-inline" style="display: block">
                                    <input type="number" name="serial_number" id="serial_number" class="form-control" title="nisn" placeholder="Please insert serial number.." style="width: 300px;">
                                </div>
                                <div class="form-inline ml-2">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                                        <i class="fa fa-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>
    </section>
@endsection