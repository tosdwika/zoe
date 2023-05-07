<!DOCTYPE html>
<html>
<head>
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
        {{-- <img src="{{ url('pic/full.png') }}" alt=""> --}}
		<h1 style="text-decoration: underline;">DATA PRIBADI PELAMAR</h1>
	</center>
 
	<table class="table table-borderless">
        <tr>
            <th style="text-align: left;">NAMA</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->nama }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">NO. KTP</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->no_ktp }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">TEMPAT, TANGGAL LAHIR</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->tempat_lahir }}, {{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->translatedFormat('d F Y') }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">JENIS KELAMIN</th>
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
            <th style="text-align: left;">AGAMA</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->agama }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">GOLONGAN DARAH</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->golongan_darah }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">STATUS</th>
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
            <th style="text-align: left;">ALAMAT KTP</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->alamat_ktp }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">ALAMAT TINGGAL</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->alamat_tinggal }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">EMAIL</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->email }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">NO. TELP</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->no_telp }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">ORANG TERDEKAT YANG DAPAT DIHUBUNGI</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->orang_terdekat }}</th>
        </tr>
    </table>
            <h4 style="text-align: left;">PENDIDIKAN TERAKHIR</h5>
            <table border="1" style="text-align: center;">
                <tr>
                    <th>
                        <label>Jenjang Pendidikan Terakhir</label>                            
                    </th>
                    <th>
                        <label>Nama Institusi Akademik</label>                            
                    </th>
                    <th>
                        <label>Jurusan</label>                            
                    </th>
                    <th>
                        <label>Tahun Lulus</label>                            
                    </th>
                    <th>
                        <label>IPK</label>                            
                    </th>
                </tr>
                @foreach ($pendidikan as $data)
                <tr>
                    <td>
                        {{ $data->jenjang_pendidikan }}
                    </td>
                    <td>
                        {{ $data->nama_sekolah }}
                    </td>
                    <td>
                        {{ $data->jurusan }}
                    </td>
                    <td>
                        {{ $data->tahun_lulus }}
                    </td>
                    <td>
                        {{ $data->ipk }}
                    </td>
                </tr>
                @endforeach
            </table>
            <h4 style="text-align: left;">RIWAYAT PELATIHAN</h5>
            <table border="1" style="text-align: center;">
                <tr>
                    <th>
                        <label>Nama Kursus/Seminar</label>                            
                    </th>
                    <th>
                        <label>Sertifikat (Ada/Tidak)</label>                            
                    </th>
                    <th>
                        <label>Tahun</label>                            
                    </th>
                </tr>
                @foreach ($pelatihan as $data)
                <tr>
                    <td>
                        {{ $data->nama_kursus }}
                    </td>
                    <td>
                        @if ($data->sertifikat = 1)
                                Ya               
                            @else
                                Tidak
                            @endif
                    </td>
                    <td>
                        {{ $data->tahun }}
                    </td>
                </tr>
                @endforeach
            </table>
            <h4 style="text-align: left;">RIWAYAT PEKERJAAAN</h5>
            <table border="1" style="text-align: center;">
                <tr>
                    <th>
                        <label>Nama Perusahaan</label>                            
                    </th>
                    <th>
                        <label>Posisi Terkahir</label>                            
                    </th>
                    <th>
                        <label>Pendapatan Terkahir</label>                            
                    </th>
                    <th>
                        <label>Tahun</label>                            
                    </th>
                </tr>
                @foreach ($pengalaman as $data)
                <tr>
                    <td>
                        {{ $data->nama_perusahaan }}
                    </td>
                    <td>
                        {{ $data->posisi_terakhir }}
                    </td>
                    <td>
                        {{ $data->gaji_terakhir }}
                    </td>
                    <td>
                        {{ $data->tahun }}
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
	<table class="table table-borderless">
        <tr>
            <th style="text-align: left;">SKILL</th>
            <th>:</th>
            <th style="text-align: left;">{{ $biodata->skill }}</th>
        </tr>
        <tr>
            <th style="text-align: left;">BERSEDIA DI TEMPATKAN</th>
            <th></th>
            <th></th>
        </tr>
            <th style="text-align: left;">DI SELURUH KANTOR PERUSAHAAN</th>
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
            <th style="text-align: left;">PENGHASILAN YANG DIHARAPKAN</th>
            <th>:</th>
            <th style="text-align: left;">Rp. {{ $biodata->gaji }} / Bulan</th>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <h4 style="text-align: right;">Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</h4>
    <br>
    <br>
    {{-- padding-right: 390px; --}}
    <h4 style="text-align: right;">{{ $biodata->nama }}</h4>
</body>
</html>