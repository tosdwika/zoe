@extends('ui.dashboard')
@section('title','Update Pelatihan')
@section('content')
<form action="/biodata/updatepelatihan/{{ $biodata->id_pelatihan }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-14">
            <div class="form-group">
                <label>Pelatihan</label>
            </div>
            <div class="form-group">
                <table class="table table-bordered">
                    <thead>
                        <th class="col-sm-2">
                            <label>Nama Kursus</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Sertifikat</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Tahun</label>                            
                        </th>
                    </thead>
                    <tbody>
                        <th class="col-sm-2">
                            <input name="nama_kursus" class="form-control" value="{{ $biodata->nama_kursus }}">
                        </th>
                        <th class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sertifikat" id="sertifikat" value="1" {{ $biodata->sertifikat == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sertifikat" id="sertifikat" value="2" {{ $biodata->sertifikat == '2' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                          </div>
                        </th>
                        <th class="col-sm-3">
                            <input name="tahun" class="form-control" value="{{ $biodata->tahun }}">
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