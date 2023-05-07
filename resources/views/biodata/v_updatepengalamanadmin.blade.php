@extends('ui.dashboard')
@section('title','Update Pengalaman')
@section('content')
<form action="/biodataupdateadmin/{{ $id_biodata }}/pengalamanadmin/{{ $id }}/updatepengalamanadmin/{{ $pengalaman->id_pengalaman }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-14">
            <div class="form-group">
                <label>Pengalaman</label>
            </div>
            <div class="form-group">
                <table class="table table-bordered">
                    <thead>
                        <th class="col-sm-2">
                            <label>Nama Perusahaan</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Posisi Terkahir</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Gaji Terkahir</label>                            
                        </th>
                        <th class="col-sm-1">
                            <label>Tahun</label>                            
                        </th>
                    </thead>
                    <tbody>
                        <th class="col-sm-2">
                            <input name="nama_perusahaan" class="form-control" value="{{ $pengalaman->nama_perusahaan }}">
                        </th>
                        <th class="col-sm-3">
                            <input name="posisi_terakhir" class="form-control" value="{{ $pengalaman->posisi_terakhir }}">
                        </th>
                        <th class="col-sm-3">
                            <input name="gaji_terakhir" class="form-control" value="{{ $pengalaman->gaji_terakhir }}">
                        </th>
                        <th class="col-sm-1">
                            <input name="tahun" class="form-control" value="{{ $pengalaman->tahun }}">
                        </th>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection