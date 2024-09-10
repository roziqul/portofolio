@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Admin Registration</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Users</div>
            <div class="breadcrumb-item"><a href="{{route('administrator-data.index')}}">Administrator</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('administrator-data.store')}}" method="post" id="formTambah" enctype=multipart/form-data>
                            @csrf
                            <div class="form-group row mb-4" style="display: none">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Photo</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="displaySelectedImage(this)">
                                    <div class="invalid-feedback" for="photo"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">E-Mail</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="email" class="form-control" name="email" id="email">
                                    <div class="invalid-feedback" for="email"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">NIP</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" name="nip" id="nip">
                                    <div class="invalid-feedback" for="nip"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Full Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="fullname" id="fullname">
                                    <div class="invalid-feedback" for="fullname"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Place of Birth</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="pob" id="pob">
                                    <div class="invalid-feedback" for="pob"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Date of Birth</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="input-group" style="width: 100%;">
                                        <input type="date" class="form-control datemask" placeholder="YYYY/MM/DD" name="dob">
                                    </div>
                                    <div class="invalid-feedback" for="dob"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Gender</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                          <input type="radio" name="gender" value="L" class="selectgroup-input" checked="">
                                          <span class="selectgroup-button">Male</span>
                                        </label>
                                        <label class="selectgroup-item">
                                          <input type="radio" name="gender" value="P" class="selectgroup-input">
                                          <span class="selectgroup-button">Female</span>
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Address</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="address" id="address">
                                    <div class="invalid-feedback" for="address"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Phone</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="string" class="form-control" name="phone" id="phone">
                                    <div class="invalid-feedback" for="phone"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="text-align: right">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fa fa-save"></i>
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection