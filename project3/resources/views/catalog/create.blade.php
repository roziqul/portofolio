@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Insert Book Collection</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Services</div>
            <div class="breadcrumb-item">Catalog</div>
            <div class="breadcrumb-item"><a href="{{route('catalog.index')}}">Book Collection</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body" id="imageContainer">
                        <h4>Cover</h4>
                        <label for="coverPreview" style="cursor: pointer;">
                            <img src="https://icons.veryicon.com/png/o/miscellaneous/myicons/book-209.png" alt="cover" style="width: 100%" id="coverPreview">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('catalog.store')}}" method="post" id="formTambah" enctype=multipart/form-data>
                            @csrf
                            <div class="form-group row mb-4" style="display: none">
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="cover" id="cover" onchange="displaySelectedImage(this)">
                                    <div class="invalid-feedback" for="serial_number"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Section</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="custom-select" name="section_id">
                                        <option selected disabled>Choose section..</option>
                                        @foreach ($section as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="custom-select" name="category_id">
                                        <option selected disabled>Choose category..</option>
                                        @foreach ($category as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Serial Number</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="serial_number" id="serial_number">
                                    <div class="invalid-feedback" for="serial_number"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="title" id="title">
                                    <div class="invalid-feedback" for="title"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Writer</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="writer" id="writer">
                                    <div class="invalid-feedback" for="writer"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Publisher</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="publisher" id="publisher">
                                    <div class="invalid-feedback" for="name"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Release Year</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="input-group" style="width: 100%;">
                                        <input type="number" class="form-control datemask" placeholder="YYYY/MM/DD" name="release_year">
                                    </div>
                                    <div class="invalid-feedback" for="birthplace"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-12 col-md-3 col-lg-3">Retail Price</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="price" id="price">
                                    <div class="invalid-feedback" for="name"></div>
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
</script>
@endsection