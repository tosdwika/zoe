@extends('ui.dashboard')
@section('title','Lowongan')
@section('content')
<style>
  input[readonly] {
      color: black;
      background-color: #f9f9f9;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h4>Lowongan Saat ini</h4>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Posisi</th>
        <th>Divisi</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="table-lowongan">
      @foreach ($lowongan as $data)
      <tr id="index_{{ $data->id_lowongan }}">
        <td>{{ $data->posisi }}</td>
        <td>{{ $data->nama_divisi }}</td>
        <td>
            <a href="javascript:void(0)" id="btn-detail-lowongan" data-id="{{ $data->id_lowongan }}" class="btn btn-primary btn-sm">Lamar</a><br>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @include('pelamar.lowongan.daftar')
@endsection