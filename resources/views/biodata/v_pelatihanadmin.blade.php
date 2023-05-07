@extends('biodata.tabadmin')
@section('title','Biodata')
@section('biodata')
<a class="btn btn-sm btn-primary" href="/biodataupdateadmin/{{ $id_biodata }}/pelatihanadmin/{{ $id }}/pelatihan">Tambah Pelatihan</a>
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
                            <label>Nama Kursus</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Sertifikat</label>                            
                        </th>
                        <th class="col-sm-3">
                            <label>Tahun</label>                            
                        </th>
                    </thead>
                    @foreach ($pelatihan as $data)
                    <tbody>
                        <th class="col-sm-2">
                            {{ $data->nama_kursus }}
                        </th>
                        <th class="col-sm-3">
                            @if ($data->sertifikat == 1)
                                Ya
                            @else
                                Tidak
                            @endif
                        </th>
                        <th class="col-sm-3">
                            {{ $data->tahun }}
                        </th>
                        <th class="col-sm-8">
                            <a class="btn btn-sm btn-warning" href="/biodataupdateadmin/{{ $biodata->id_biodata }}/pelatihanadmin/{{ $biodata->id }}/updatepelatihanformadmin/{{ $data->id_pelatihan }}">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pelatihan }}">
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
@foreach ($pelatihan as $data)
<div class="modal fade" id="delete{{ $data->id_pelatihan }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->nama_kursus }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin meghapus {{ $data->nama_kursus }}</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
        <a href="/deletepelatihanadmin/{{ $data->id_pelatihan }}" class="btn btn-sm btn-warning">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection