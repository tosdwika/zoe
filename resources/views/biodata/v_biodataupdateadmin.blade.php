@extends('biodata.tabadmin')
@section('title','Biodata')
@section('biodata')
<a class="btn btn-sm btn-primary" href="/updatebiodataformadmin/{{ $biodata->id_biodata }}">Update Biodata</a>
<table class="table table-borderless">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ session('pesan') }}
    </div>
    @endif
    <tr>
        <th width="270px">NAMA</th>
        <th>:</th>
        <th>{{ $biodata->nama }}</th>
    </tr>
    <tr>
        <th width="270px">NO. KTP</th>
        <th>:</th>
        <th>{{ $biodata->no_ktp }}</th>
    </tr>
    <tr>
        <th width="270px">TEMPAT, TANGGAL LAHIR</th>
        <th>:</th>
        <th>{{ $biodata->tempat_lahir }}, {{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->translatedFormat('d F Y') }}</th>
    </tr>
    <tr>
        <th width="270px">JENIS KELAMIN</th>
        <th>:</th>
        <th>
            @if ($biodata->jenis_kelamin == 1)
                Laki-laki                
            @else
                Perempuan
            @endif
        </th>
    </tr>
    <tr>
        <th width="270px">AGAMA</th>
        <th>:</th>
        <th>{{ $biodata->agama }}</th>
    </tr>
    <tr>
        <th width="270px">GOLONGAN DARAH</th>
        <th>:</th>
        <th>{{ $biodata->golongan_darah }}</th>
    </tr>
    <tr>
        <th width="270px">STATUS</th>
        <th>:</th>
        <th>
            @if ($biodata->status_kawin == 1)
                Belum Menikah               
            @else
                Menikah
            @endif
        </th>
    </tr>
    <tr>
        <th width="270px">ALAMAT KTP</th>
        <th>:</th>
        <th>{{ $biodata->alamat_ktp }}</th>
    </tr>
    <tr>
        <th width="270px">ALAMAT TINGGAL</th>
        <th>:</th>
        <th>{{ $biodata->alamat_tinggal }}</th>
    </tr>
    <tr>
        <th width="270px">EMAIL</th>
        <th>:</th>
        <th>{{ $biodata->email }}</th>
    </tr>
    <tr>
        <th width="270px">NO. TELP</th>
        <th>:</th>
        <th>{{ $biodata->no_telp }}</th>
    </tr>
    <tr>
        <th width="400px">ORANG TERDEKAT YANG DAPAT DIHUBUNGI</th>
        <th>:</th>
        <th>{{ $biodata->orang_terdekat }}</th>
    </tr>
    <tr>
        <th width="270px">SKILL</th>
        <th>:</th>
        <th>{{ $biodata->skill }}</th>
    </tr>
    <tr>
        <th width="270px">BERSEDIA DI TEMPATKAN DI SELURUH KANTOR PERUSAHAAN</th>
        <th>:</th>
        <th>
            @if ($biodata->roaming == 1)
                Ya               
            @else
                Tidak
            @endif
        </th>
    </tr>
    <tr>
        <th width="270px">PENGHASILAN YANG DIHARAPKAN</th>
        <th>:</th>
        <th>Rp. {{ $biodata->gaji }} / Bulan</th>
    </tr>
</table>
@endsection