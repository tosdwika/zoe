@extends('biodata.tabadmin')
@section('title','Biodata')
@section('biodata')
<div class="content">
<a class="btn btn-sm btn-primary" href="/biodataupdateadmin/{{ $id_biodata }}/pendidikanadmin/{{ $id }}/pendidikan">Tambah Pendidikan</a>
    @if (session('pesan'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  {{ session('pesan') }}
</div>
@endif
    <div class="row">
        <div class="col-lg-12">            
            <div class="form-group">
                <table class="table table-bordered">
                    <thead>
                        <th class="col-sm-2">
                            <label>Jenjang Pendidikan</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Nama Sekolah</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Jurusan</label>                            
                        </th>
                        <th class="col-sm-1">
                            <label>Tahun Lulus</label>                            
                        </th>
                        <th class="col-sm-1">
                            <label>IPK</label>                            
                        </th>
                        <th class="col-sm-8">
                            <label>Aksi</label>                            
                        </th>
                    </thead>
                    @foreach ($pendidikan as $data)
                    <tbody>
                        <th class="col-sm-2">
                            {{ $data->jenjang_pendidikan }}
                        </th>
                        <th class="col-sm-3">
                            {{ $data->nama_sekolah }}
                        </th>
                        <th class="col-sm-3">
                            {{ $data->jurusan }}
                        </th>
                        <th class="col-sm-1">
                            {{ $data->tahun_lulus }}
                        </th>
                        <th class="col-sm-1">
                            {{ $data->ipk }}
                        </th>
                        <th class="col-sm-8">
                            <a class="btn btn-sm btn-warning" href="/biodataupdateadmin/{{ $biodata->id_biodata }}/pendidikanadmin/{{ $biodata->id }}/updatependidikanformadmin/{{ $data->id_pendidikan }}">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pendidikan }}">
                                Hapus
                            </button>
                        </th>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@foreach ($pendidikan as $data)
<div class="modal fade" id="delete{{ $data->id_pendidikan }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->nama_sekolah }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin meghapus {{ $data->nama_sekolah }}</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
        <a href="/deletependidikanadmin/{{ $data->id_pendidikan }}" class="btn btn-sm btn-warning">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection