@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Kontak</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('contact.update', $contact->id)}}" method="post" id="formTambah" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="address" value="{{$contact->address}}">
                                    <div class="invalid-feedback" for="address"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="email" value="{{$contact->email}}">
                                    <div class="invalid-feedback" for="email"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Nomor Whatsapp</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="contact_wa" value="{{$contact->contact_wa}}">
                                    <div class="invalid-feedback" for="contact_wa"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Nomor WeChat</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="contact_wechat" value="{{$contact->contact_wechat}}">
                                    <div class="invalid-feedback" for="contact_wechat"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Akun Facebook</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="facebook" value="{{$contact->facebook}}">
                                    <div class="invalid-feedback" for="facebook"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Akun Tiktok</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="tiktok" value="{{$contact->tiktok}}">
                                    <div class="invalid-feedback" for="tiktok"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Akun Instagram</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="instagram" value="{{$contact->instagram}}">
                                    <div class="invalid-feedback" for="instagram"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="text-align: right">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-8">
                                    <a type="button" href="{{route('contact.index')}}" class="btn btn-icon icon-left btn-danger">
                                        <i class="fa fa-times"></i>
                                        Batalkan
                                    </a>
                                    <button type="submit" class="btn btn-icon icon-left btn-success">
                                        <i class="fa fa-save"></i>
                                        Simpan
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
