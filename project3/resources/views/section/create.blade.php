@extends('master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add New Section</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Services</div>
                <div class="breadcrumb-item">Catalog</div>
                <div class="breadcrumb-item"><a href="{{route('section.index')}}">Section Collection</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <form action="{{ route('section.store') }}" method="post" id="insertCategory">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Section</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
