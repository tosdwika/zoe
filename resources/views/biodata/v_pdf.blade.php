<!DOCTYPE html>
<html>
<style>
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>
<head>
<a href="/allbiodata" class="btn btn-sm btn-primary">Kembali</a>
	<title>Data Pribadi Pelamar</title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>

	<center>
        <img src="{{ url('pic/full.png') }}" width="300px">
		<h1 style="text-decoration: underline;">DATA PRIBADI PELAMAR</h1>
	</center>
 
	<table class="table table-borderless">
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">NAMA</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->nama }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">NO. KTP</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->no_ktp }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">TEMPAT, TANGGAL LAHIR</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->tempat_lahir }}, {{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->translatedFormat('d F Y') }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">JENIS KELAMIN</th>
            <th>:</th>
            <th style="text-align: left;">
                @if ($biodata->jenis_kelamin = 1)
                    Laki-laki                
                @else
                    Perempuan
                @endif
            </th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">AGAMA</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->agama }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">GOLONGAN DARAH</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->golongan_darah }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">STATUS</th>
            <th>:</th>
            <th style="text-align: left;">
                @if ($biodata->status_kawin = 1)
                    Menikah               
                @else
                    Belum Menikah
                @endif
            </th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">ALAMAT KTP</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->alamat_ktp }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">ALAMAT TINGGAL</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->alamat_tinggal }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">EMAIL</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->email }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">NO. TELP</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->no_telp }}</th>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">ORANG TERDEKAT YANG DAPAT DIHUBUNGI</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->orang_terdekat }}</th>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">PENDIDIKAN TERAKHIR</th>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">
            <table style="text-align: center; padding-left: 200px; border-collapse: collapse;">
                <thead>
                    <th class="col-sm-2" style="border: 1px solid;">
                        <label>Jenjang Pendidikan Terakhir</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Nama Institusi Akademik</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Jurusan</label>                            
                    </th>
                    <th class="col-sm-1" style="border: 1px solid;">
                        <label>Tahun Lulus</label>                            
                    </th>
                    <th class="col-sm-1" style="border: 1px solid;">
                        <label>IPK</label>                            
                    </th>
                </thead>
            </th>
                @foreach ($pendidikan as $data)
                <tbody>
                    <td class="col-sm-2" style="border: 1px solid;">
                        {{ $data->jenjang_pendidikan }}
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->nama_sekolah }}
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->jurusan }}
                    </td>
                    <td class="col-sm-1" style="border: 1px solid;">
                        {{ $data->tahun_lulus }}
                    </td>
                    <td class="col-sm-1" style="border: 1px solid;">
                        {{ $data->ipk }}
                    </td>
                </tbody>
                @endforeach
            </table>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">RIWAYAT PELATIHAN</th>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">
            <table style="text-align: center; padding-left: 200px; border-collapse: collapse;">
                <thead>
                    <th class="col-sm-2" style="border: 1px solid;">
                        <label>Nama Kursus/Seminar</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Sertifikat (Ada/Tidak)</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Tahun</label>                            
                    </th>
                </thead>
            </th>
                @foreach ($pelatihan as $data)
                <tbody>
                    <td class="col-sm-2" style="border: 1px solid;">
                        {{ $data->nama_kursus }}
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        @if ($data->sertifikat = 1)
                                Ya               
                            @else
                                Tidak
                            @endif
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->tahun }}
                    </td>
                </tbody>
                @endforeach
            </table>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">RIWAYAT PEKERJAAAN</th>
        </tr>
        <tr>
            <th width="400px" style="text-align: left; padding-left: 200px;">
            <table style="text-align: center; padding-left: 200px; border-collapse: collapse;">
                <thead>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Nama Perusahaan</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Posisi Terakhir</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Pendapatan Terkahir</label>                            
                    </th>
                    <th class="col-sm-3" style="border: 1px solid;">
                        <label>Tahun</label>                            
                    </th>
                </thead>
            </th>
                @foreach ($pengalaman as $data)
                <tbody>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->nama_perusahaan }}
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->posisi_terakhir }}
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->gaji_terakhir }}
                    </td>
                    <td class="col-sm-3" style="border: 1px solid;">
                        {{ $data->tahun }}
                    </td>
                </tbody>
                @endforeach
            </table>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">SKILL</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->skill }}</th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">BERSEDIA DI TEMPATKAN DI SELURUH KANTOR PERUSAHAAN</th>
            <th>:</th>
            <th style="text-align: left;">
                @if ($biodata->roaming = 1)
                    Ya               
                @else
                    Tidak
                @endif
            </th>
        </tr>
        <tr>
            <th width="270px" style="text-align: left; padding-left: 200px;">PENGHASILAN YANG DIHARAPKAN</th>
            <th>:</th>
            <th style="text-align: left;">Rp. {{ $biodata->gaji }} / Bulan</th>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    {{-- <br>
    <h4 style="text-align: right; padding-right: 350px;">Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</h4>
    <br>
    <br>
    <h4 style="text-align: right; padding-right: 390px;">{{ $biodata->nama }}</h4> --}}
</body>
</html>