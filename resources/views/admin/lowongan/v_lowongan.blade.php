@extends('ui.dashboard')
@section('title','Lowongan')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-lowongan">Tambah</a>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Posisi</th>
        <th>Deskripsi Lowongan</th>
        <th>Divisi</th>
        <th>Tanggal Dibuat</th>
        <th>Tanggal Diupdate</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="table-lowongan">
      @foreach ($lowongan as $data)
      <tr id="index_{{ $data->id_lowongan }}">
        <td>{{ $data->posisi }}</td>
        <td>{{ $data->deskripsi }}</td>
        <td>{{ $data->nama_divisi }}</td>
        <td>{{ $data->created_at }}</td>
        <td>{{ $data->updated_at }}</td>
        <td>
            <a href="javascript:void(0)" id="btn-detail-lowongan" data-id="{{ $data->id_lowongan }}" class="btn btn-warning btn-sm">Detail</a><br>
            <a href="javascript:void(0)" id="btn-update-lowongan" data-id="{{ $data->id_lowongan }}" class="btn btn-primary btn-sm">Edit</a><br>
            <a href="javascript:void(0)" id="btn-delete-lowongan" data-id="{{ $data->id_lowongan }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @include('admin.lowongan.create')
  @include('admin.lowongan.detail')
  @include('admin.lowongan.update')
  @include('admin.lowongan.delete')
@endsection