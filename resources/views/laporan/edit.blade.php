@extends('adminlte::page')

@section('title','Edit Laporan')

@section('content_header')
<h1>Edit Laporan</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('laporan.update',$laporan->id) }}" method="POST">

@csrf
@method('PUT')

<div class="form-group">

<label>Judul</label>

<input
type="text"
name="judul"
value="{{ $laporan->judul }}"
class="form-control">

</div>

<div class="form-group">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control">{{ $laporan->deskripsi }}</textarea>

</div>

<div class="form-group">

<label>Lokasi</label>

<input
type="text"
name="lokasi"
value="{{ $laporan->lokasi }}"
class="form-control">

</div>

<div class="form-group">

<label>Status</label>

<select
name="status"
class="form-control">

<option>Menunggu</option>

<option>Diproses</option>

<option>Selesai</option>

</select>

</div>

<br>

<button class="btn btn-primary">

Update

</button>

</form>

</div>

</div>

@stop