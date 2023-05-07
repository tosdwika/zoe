@extends('ui.dashboard')
@section('title','Biodata')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('biodataupdate') ? 'active' : '' }}" href="{{ url('/cekdaftar') }}">Biodata</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pendidikan') ? 'active' : '' }}" href="{{ url('/pendidikan') }}">Pendidikan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pelatihan') ? 'active' : '' }}" href="{{ url('/pelatihan') }}">Pelatihan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pengalaman') ? 'active' : '' }}" href="{{ url('/pengalaman') }}">Pengalaman</a>
    </li>
    <li class="nav-item ml-auto">
      <a class="btn btn-sm btn-warning" href="/pdf">Cetak PDF</a>
    </li>
  </ul>
@yield('biodata')
@endsection