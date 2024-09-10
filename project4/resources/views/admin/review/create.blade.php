@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Ulasan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="documentationContainer">
                        <label for="documentationPreview" style="cursor: pointer;">
                            <h4>Dokumentasi</h4>
                            <img src="https://icons.veryicon.com/png/o/miscellaneous/myicons/book-209.png" alt="Documentation" style="width: 100%" id="DocumentationPreview">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="customerContainer">
                        <label for="customerPreview" style="cursor: pointer;">
                            <h4>Foto Customer</h4>
                            <img src="https://icons.veryicon.com/png/o/miscellaneous/myicons/book-209.png" alt="Customer" style="width: 100%" id="customerPreview">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('review.store')}}" method="post" id="formTambah" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4" style="display: none">
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="documentation" id="documentation" onchange="displaySelectedDocumentation(this)">
                                    <div class="invalid-feedback" for="documentation"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="display: none">
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="photo_customer" id="photo_customer" onchange="displaySelectedCustomerPhoto(this)">
                                    <div class="invalid-feedback" for="photo_customer"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Customer</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name">
                                    <div class="invalid-feedback" for="photo_customer"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Subdestinasi</label>
                                <div class="col-sm-12 col-md-8">
                                    <select class="form-control" name="sub_destination_id">
                                        @foreach ($subdestinations as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Ulasan</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea id="description" name="review" rows="10" style="width: 100%"></textarea>
                                    <div class="invalid-feedback" for="description"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="text-align: right">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-8">
                                    <a type="button" href="{{route('review.index')}}" class="btn btn-icon icon-left btn-danger">
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
<script>
    function displaySelectedDocumentation() {
        const fileInput = document.getElementById('documentation');
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const documentationPreview = document.getElementById('DocumentationPreview');
            const reader = new FileReader();

            reader.onload = function (e) {
                documentationPreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    }

    document.getElementById('documentationContainer').addEventListener('click', function () {
        document.getElementById('documentation').click();
    });
</script>
<script>
    function displaySelectedCustomerPhoto() {
        const fileInput = document.getElementById('photo_customer');
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const customerPreview = document.getElementById('customerPreview');
            const reader = new FileReader();

            reader.onload = function (e) {
                customerPreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    }

    document.getElementById('customerContainer').addEventListener('click', function () {
        document.getElementById('photo_customer').click();
    });
</script>
@endsection
