@extends('ui.dashboard')
@section('title','Update Biodata')
@section('content')
<form action="/biodata/insertbiodata" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-14">
            <div class="form-group">
                <label>Nama</label>
                <input name="nama" class="form-control" value="{{ old('nama') }}">
                <div class="text-danger">
                    @error('nama')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>No. KTP</label>
                <input name="no_ktp" class="form-control" value="{{ old('no_ktp') }}">
                <div class="text-danger">
                    @error('no_ktp')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                <div class="text-danger">
                    @error('tempat_lahir')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input name="tanggal_lahir" class="form-control" type="date" value="{{ old('tanggal_lahir') }}">
                <div class="text-danger">
                    @error('tanggal_lahir')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="1">
                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="2">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                  </div>
                <div class="text-danger">
                    @error('jenis_kelamin')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <input name="agama" class="form-control" value="{{ old('agama') }}">
                <div class="text-danger">
                    @error('agama')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Golongan Darah</label>
                <input name="golongan_darah" class="form-control" value="{{ old('golongan_darah') }}">
                <div class="text-danger">
                    @error('golongan_darah')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Status Kawin : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_kawin" id="status_kawin" value="1">
                    <label class="form-check-label" for="inlineRadio1">Belum Menikah</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_kawin" id="status_kawin" value="2">
                    <label class="form-check-label" for="inlineRadio2">Menikah</label>
                  </div>
                <div class="text-danger">
                    @error('status_kawin')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Alamat KTP</label>
                <input name="alamat_ktp" class="form-control" value="{{ old('alamat_ktp') }}">
                <div class="text-danger">
                    @error('alamat_ktp')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Tinggal</label>
                <input name="alamat_tinggal" class="form-control" value="{{ old('alamat_tinggal') }}">
                <div class="text-danger">
                    @error('alamat_tinggal')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" class="form-control" type="email" value="{{ old('email') }}">
                <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>No. Telp</label>
                <input name="no_telp" class="form-control" value="{{ old('no_telp') }}">
                <div class="text-danger">
                    @error('no_telp')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Orang Terdekat Yang Dapat Dihubungi (No. Telp)</label>
                <input name="orang_terdekat" class="form-control" value="{{ old('orang_terdekat') }}">
                <div class="text-danger">
                    @error('orang_terdekat')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Skill (Tuliskan Keahlian & Ketrampilan yang saat ini anda miliki)</label>
                <input name="skill" class="form-control" value="{{ old('skill') }}">
                <div class="text-danger">
                    @error('skill')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Bersedia di tempatkan diseluruh kantor perusahaan : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="roaming" id="roaming" value="1">
                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="roaming" id="roaming" value="2">
                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                  </div>
                <div class="text-danger">
                    @error('roaming')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Penghasilan yang diharapkan per bulan</label>
                <input name="gaji" class="form-control" value="{{ old('gaji') }}">
                <div class="text-danger">
                    @error('gaji')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection