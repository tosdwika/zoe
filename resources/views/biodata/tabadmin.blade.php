@extends('ui.dashboard')
@section('title','Biodata')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="/biodataupdateadmin/{{ $biodata->id_biodata }}">Biodata</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/biodataupdateadmin/{{ $biodata->id_biodata }}/pendidikanadmin/{{ $biodata->id }}">Pendidikan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/biodataupdateadmin/{{ $biodata->id_biodata }}/pelatihanadmin/{{ $biodata->id }}">Pelatihan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/biodataupdateadmin/{{ $biodata->id_biodata }}/pengalamanadmin/{{ $biodata->id }}">Pengalaman</a>
    </li>
    <li class="nav-item ml-auto">
      <a class="btn btn-sm btn-warning" href="/biodataupdateadmin/{{ $biodata->id_biodata }}/pdfadmin">Cetak PDF</a>
    </li>
  </ul>
@yield('biodata')
@endsection