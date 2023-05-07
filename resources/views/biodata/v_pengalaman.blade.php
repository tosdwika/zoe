@extends('biodata.tab')
@section('title','Biodata')
@section('biodata')
<a class="btn btn-sm btn-primary" href="/biodata/pengalaman">Tambah Pengalaman</a>
<div class="content">
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
                            <label>Nama Perusahaan</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Posisi Terakhir</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Gaji Terakhir</label>                            
                        </th>
                        <th class="col-sm-1">
                            <label>Tahun</label>                            
                        </th>
                    </thead>
                    @foreach ($biodata as $data)
                    <tbody>
                        <th class="col-sm-2">
                            {{ $data->nama_perusahaan }}
                        </th>
                        <th class="col-sm-3">
                            {{ $data->posisi_terakhir }}
                        </th>
                        <th class="col-sm-3">
                            {{ $data->gaji_terakhir }}
                        </th>
                        <th class="col-sm-1">
                            {{ $data->tahun }}
                        </th>
                        <th class="col-sm-8">
                            <a class="btn btn-sm btn-warning" href="/biodata/updatepengalamanform/{{ $data->id_pengalaman }}">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pengalaman }}">
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
@foreach ($biodata as $data)
<div class="modal fade" id="delete{{ $data->id_pengalaman }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->nama_perusahaan }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin meghapus {{ $data->nama_perusahaan }}</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
        <a href="/biodata/deletepengalaman/{{ $data->id_pengalaman }}" class="btn btn-sm btn-warning">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection