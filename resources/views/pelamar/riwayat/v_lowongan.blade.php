@extends('ui.dashboard')
@section('title','Riwayat Pendaftaran')
@section('content')
<style>
  input[readonly] {
      color: black;
      background-color: #f9f9f9;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h4>Riwayat Pendaftaran</h4>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Posisi</th>
        <th>Divisi</th>
        <th>Tanggal Pendaftaran</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($riwayat as $data)
      <tr>
        <td>{{ $data->posisi }}</td>
        <td>{{ $data->nama_divisi }}</td>
        <td>{{ $data->tanggal_daftar }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection