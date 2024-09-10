@extends('admin.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kontak</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Whatsapp</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->contact_wa}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor WeChat</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->contact_wechat}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Akun Facebook</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->facebook}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Akun Tiktok</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->tiktok}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Akun Instagram</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">{{$contact->instagram}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <div class="btn-group">
                                <button type="button" onclick="window.location.href='{{route('contact.edit', $contact->id)}}'" class="btn btn-icon icon-left btn-primary mr-2">
                                    <i class="fas fa-pen mx-1"></i>
                                    Edit
                                </button>
                                <button type="button" onclick="window.location.href='{{route('contact.index')}}'" class="btn btn-icon icon-left btn-primary">
                                    <i class="fas fa-undo mx-1"></i>
                                    Kembali
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
