@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Galeri Baru</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="imageContainer">
                        <label for="coverPreview" style="cursor: pointer;">
                            <h4>Foto Dokumentasi</h4>
                            <img src="https://icons.veryicon.com/png/o/miscellaneous/myicons/book-209.png" alt="Cover" style="width: 100%" id="coverPreview">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('gallery.store')}}" method="post" id="formTambah" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4" style="display: none">
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="displaySelectedImage(this)">
                                    <div class="invalid-feedback" for="photo"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Destinasi</label>
                                <div class="col-sm-12 col-md-8">
                                    <select class="form-control" name="sub_destination_id">
                                        @foreach ($destinations as $d)
                                            <option value="{{$d->id}}">{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4" style="text-align: right">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-8">
                                    <a type="button" href="{{route('gallery.index')}}" class="btn btn-icon icon-left btn-danger">
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
            const coverPreview = document.getElementById('coverPreview');
            const reader = new FileReader();

            reader.onload = function (e) {
                coverPreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    }

    document.getElementById('imageContainer').addEventListener('click', function () {
        document.getElementById('photo').click();
    });

    tinymce.init({
        selector: '#description',
        plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        menubar: false
    });
</script>
@endsection
