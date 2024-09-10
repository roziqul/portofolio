@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Form Input Banyak Buku</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Forms</a></div>
        <div class="breadcrumb-item">Advanced Forms</div>
      </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Cover</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file..</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Section</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Penyusun</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Penerbit</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Satuan</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="text-align: right">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h2>Scan Nomor Seri</h2>
                        <a href="{{route('buku.katalog.single')}}" class="btn btn-primary mt-4">Mulai Scan</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Section</th>
                                            <th style="text-align: center">Kategori</th>
                                            <th style="text-align: center">Nomor Seri</th>
                                            <th style="text-align: center">Judul</th>
                                            <th style="text-align: center">Penyusun</th>
                                            <th style="text-align: center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center">A107</td>
                                            <td style="text-align: center">PELAJARAN</td>
                                            <td style="text-align: center">337123091</td>
                                            <td>MODUL PEMBELAJARAN TAHUN 2025</td>
                                            <td>Itsuki Takahashi</td>
                                            <td style="text-align: center"><a href="{{route('buku.katalog.show')}}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">A107</td>
                                            <td style="text-align: center">PELAJARAN</td>
                                            <td style="text-align: center">337123091</td>
                                            <td>MODUL PEMBELAJARAN TAHUN 2025</td>
                                            <td>Itsuki Takahashi</td>
                                            <td style="text-align: center"><a href="{{route('buku.katalog.show')}}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">A107</td>
                                            <td style="text-align: center">PELAJARAN</td>
                                            <td style="text-align: center">337123091</td>
                                            <td>MODUL PEMBELAJARAN TAHUN 2025</td>
                                            <td>Itsuki Takahashi</td>
                                            <td style="text-align: center"><a href="{{route('buku.katalog.show')}}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">A107</td>
                                            <td style="text-align: center">PELAJARAN</td>
                                            <td style="text-align: center">337123091</td>
                                            <td>MODUL PEMBELAJARAN TAHUN 2025</td>
                                            <td>Itsuki Takahashi</td>
                                            <td style="text-align: center"><a href="{{route('buku.katalog.show')}}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection