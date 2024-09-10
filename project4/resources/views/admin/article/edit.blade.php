@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Artikel</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="imageContainer">
                        <label for="coverPreview" style="cursor: pointer;">
                            <h4>Foto Artikel</h4>
                            <img src="{{$article->photo}}" alt="Cover" style="width: 100%" id="coverPreview">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('article.update', $article->id)}}" method="post" id="formTambah" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row mb-4" style="display: none">
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="photo" id="cover" onchange="displaySelectedImage(this)">
                                    <div class="invalid-feedback" for="photo"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Judul Artikel</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{$article->title}}">
                                    <div class="invalid-feedback" for="title"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Deskripsi</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea id="description" name="description" rows="10" style="width: 100%">{{$article->description}}</textarea>
                                    <div class="invalid-feedback" for="description"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="text-align: right">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-8">
                                    <a type="button" href="{{route('article.index')}}" class="btn btn-icon icon-left btn-danger">
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
        const fileInput = document.getElementById('cover');
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const coverPreview = document.getElementById('coverPreview');
            const reader = new FileReader();

            reader.onload = function (e) {
                coverPreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    }

    document.getElementById('imageContainer').addEventListener('click', function () {
        document.getElementById('cover').click();
    });

    tinymce.init({
        selector: '#description',
        plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        menubar: false
    });
</script>
@endsection
