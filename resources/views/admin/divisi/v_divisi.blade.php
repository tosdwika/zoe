@extends('ui.dashboard')
@section('title','Divisi')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-divisi">Tambah</a>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama Divisi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="table-divisi">
      @foreach ($divisi as $data)
      <tr id="index_{{ $data->id_divisi }}">
        <td>{{ $data->nama_divisi }}</td>
        <td>
            <a href="javascript:void(0)" id="btn-detail-divisi" data-id="{{ $data->id_divisi }}" class="btn btn-warning btn-sm">Detail</a>
            <a href="javascript:void(0)" id="btn-update-divisi" data-id="{{ $data->id_divisi }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="javascript:void(0)" id="btn-delete-divisi" data-id="{{ $data->id_divisi }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @include('admin.divisi.create')
  @include('admin.divisi.detail')
  @include('admin.divisi.update')
  @include('admin.divisi.delete')
@endsection