@extends('ui.dashboard')
@section('title','Admin')
@section('content')
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  {{ session('pesan') }}
</div>
@endif
<h3>Daftar Pelamar</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Tempat & Tanggal Lahir</th>
      <th>Posisi Yang Dilamar</th>
      <th>Tanggal Pendaftaran</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    @foreach ($apply as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->nama }}</td>
      <td>{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
      <td>{{ $data->posisi }}</td>
      <td>{{ \Carbon\Carbon::parse($data->tanggal_daftar)->translatedFormat('d F Y') }}</td>
      <td>
        <a href="https://api.whatsapp.com/send/?phone=62{{ $data->no_telp }}" target="_blank">
          <img src="{{ asset('pic') }}/wa.png" width="35px" alt="Product Image">
        </a>
        <a href="/view_pdf/{{ $data->id_biodata }}" class="btn btn-sm btn-primary">Detail</a>
        <a href="/biodataupdateadmin/{{ $data->id_biodata }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_apply }}">
          Hapus
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@foreach ($apply as $data)
<div class="modal fade" id="delete{{ $data->id_apply }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->nama }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus {{ $data->nama }} {{ $data->posisi }}</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
        <a href="/allbiodata/delete/{{ $data->id_apply }}" class="btn btn-sm btn-warning">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection