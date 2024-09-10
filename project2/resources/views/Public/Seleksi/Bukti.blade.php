<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @font-face {
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: normal;
            src: url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
        }
        table, th, td {
            border-radius: var(--bs-card-border-radius);
            font-family: "Poppins", sans-serif;
        }
        .header {
            padding-top: 10px;
            padding-bottom: 10px;  
            align-items: center;
            margin: auto;
            border-bottom: 5px solid black;
        }
        .isi {
            justify-content: center;
            align-items: center;
        }
        .halaman {
            align-items: center;
            width: 180mm;
            height: 267mm;
            padding: 5px;
            margin-block: auto;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            margin: 0 0 0 0;
            padding: 0;
        }

        .logo {
            margin-left: 20px;
            display: inline-block;
        }

        .alamat {
            margin-top: 10px;
            margin-right: 20px;
            display: inline-block;
            padding: 5px;
            float: right;
            vertical-align: middle;
        }
        .sepertiga{
            width: 30%;
            text-align: center;
            display: inline-block;
        }

        .btn-success{
            background-color: #18d26e;
            color: white; 
            padding-block: 5px;
            width: 50px;
            border-radius: 5px;
            border: solid #18d26e;
            margin-top: 10px;
        }
        .container{
            width: 90%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="halaman">
        <div class="container">
        <div class="header" style="align-items: center">
            <div class="logo">
                <img src="{{public_path('adminAssets/logo/Noval_Logo.jpg')}}" alt="" style="width: 100px; height: 100px">
            </div>
            <div class="alamat" style="width: max-content;">
                <h2 style="text-align: center; width: 100%;">SMP Unggulan Noval 01</h2>
                <h4 style="text-align: center; width: 100%;">Jl. Sudancho Supriadi 149 Kota Blitar.</h4>
                <h5 style="text-align: center; margin-top: 5px; width: 100%;">No. Telp: (0342)123456 Fax: (0342)123456 Email: novalunggulan@sch.id</h5>
            </div>
        </div>
        <div class="isi">
            <div class="siswa">
                <h3 style="text-align: center; margin-top: 25px">SURAT KETERANGAN TELAH DITERIMA</h3>
                    <h4 style="text-align: left; margin-left: 10px; margin-top: 25px">Dengan adanya surat ini, menerangkan bahwa saudara :</h4>
                <table class="bdr" style="margin: 10px;">
                    <tbody>
                        @foreach ($datasiswa as $key => $value)
                            <tr>
                                <td class="h5">{{ $key }}</td>
                                <td class="h5">:</td>
                                <td class="h5">{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 style="text-align: left; margin-left: 10px; margin-top: 30px">Telah lolos dalam tahap seleksi dengan nilai :</h4>
                <table class="bdr" style="margin: 10px;">
                    <tbody>
                        @foreach ($dataseleksi as $key => $value)
                            <tr>
                                <td class="h5">{{ $key }}</td>
                                <td class="h5">:</td>
                                <td class="h5">{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($ss as $acc)
                <h4 style="text-align: left; margin-left: 10px; margin-top: 30px">Dan telah dinyatakan AKTIF terhitung sejak tanggal {{ Carbon\Carbon::parse($acc->updated_at)->translatedFormat('d M Y'); }}. Demikian dengan terbitnya surat ini harap dapat digunakan untuk semestinya.</h4>
                @endforeach
            </div>
            <div class="penutup" style="margin-top: 150px">
                <div class="sepertiga">

                </div>
                <div class="sepertiga">

                </div>
                <div class="sepertiga">
                    @foreach ($ss as $acc)
                    <h4 style="margin-top: 100px">Blitar, {{ Carbon\Carbon::parse($acc->updated_at)->translatedFormat('d M Y'); }}</h4>
                    @endforeach
                    <img src="{{public_path('adminAssets/logo/qr.png')}}" alt="" style="width: 150px; height: 150px">
                    <h4>Admisi SMP Unggulan Noval 01</h4>                      
                </div>

            </div>
        </div>
        <div class="footer">

        </div>
    </div>
    </div>
</body>

</html>
