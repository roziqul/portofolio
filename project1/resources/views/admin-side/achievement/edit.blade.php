@extends('admin-side.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data Prestasi</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body" id="imageContainer" style="cursor: pointer;">
                        <label for="photo" style="cursor: pointer;">
                            <img src="{{ filter_var($achievement->photo, FILTER_VALIDATE_URL) ? $achievement->photo : asset('storage/' . $achievement->photo) }}" alt="Dokumentasi" style="width: 100%" id="photoPreview">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('achievement.update', $achievement->id)}}" method="post" id="formTambah" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row mb-4" style="display: none;">
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="displaySelectedImage()">
                                    <div class="invalid-feedback" for="photo"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Perlombaan</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{$achievement->title}}">
                                    <div class="invalid-feedback" for="title"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Tahun</label>
                                <div class="col-sm-12 col-md-8">
                                    <div class="input-group" style="width: 100%;">
                                        <input type="number" class="form-control datemask" name="year" value="{{$achievement->year}}">
                                    </div>
                                    <div class="invalid-feedback" for="year"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Perwakilan</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="student_name" value="{{$achievement->student_name}}">
                                    <div class="invalid-feedback" for="student_name"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="text-align: right">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-8">
                                    <a type="button" href="{{route('achievement.index')}}" class="btn btn-icon icon-left btn-danger">
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
    function displaySelectedImage() {
        const fileInput = document.getElementById('photo');
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const photoPreview = document.getElementById('photoPreview');
            const reader = new FileReader();

            reader.onload = function (e) {
                photoPreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    }

    document.getElementById('imageContainer').addEventListener('click', function () {
        document.getElementById('photo').click();
    });
</script>
@endsection
