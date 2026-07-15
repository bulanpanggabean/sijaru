@extends('adminlte::page')

@section('title','Detail Laporan')

@section('content_header')

<h1>

<i class="fas fa-file-alt text-primary"></i>

Detail Laporan Jalan Rusak

</h1>

@stop

@section('css')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

.card{

border-radius:15px;

box-shadow:0px 5px 15px rgba(0,0,0,.1);

}

img{

border-radius:10px;

}

#map{

height:350px;

border-radius:10px;

}

</style>

@stop

@section('content')

<div class="row">

<div class="col-md-5">

<div class="card">

<div class="card-header bg-primary text-white">

<h5>

<i class="fas fa-camera"></i>

Foto Laporan

</h5>

</div>

<div class="card-body text-center">

@if($laporan->foto)

<img
src="{{ asset('storage/laporan/'.$laporan->foto) }}"
class="img-fluid">

@else

<img
src="https://via.placeholder.com/500x350?text=Tidak+Ada+Foto"
class="img-fluid">

@endif

</div>

</div>

</div>

<div class="col-md-7">

<div class="card">

<div class="card-header bg-success text-white">

<h5>

<i class="fas fa-info-circle"></i>

Informasi Laporan

</h5>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th width="180">Judul</th>

<td>{{ $laporan->judul }}</td>

</tr>

<tr>

<th>Deskripsi</th>

<td>{{ $laporan->deskripsi }}</td>

</tr>

<tr>

<th>Lokasi</th>

<td>{{ $laporan->lokasi }}</td>

</tr>

<tr>

<th>Latitude</th>

<td>{{ $laporan->latitude }}</td>

</tr>

<tr>

<th>Longitude</th>

<td>{{ $laporan->longitude }}</td>

</tr>

<tr>

<th>Status</th>

<td>

@if($laporan->status=="Menunggu")

<span class="badge badge-warning">

{{ $laporan->status }}

</span>

@elseif($laporan->status=="Diproses")

<span class="badge badge-primary">

{{ $laporan->status }}

</span>

@else

<span class="badge badge-success">

{{ $laporan->status }}

</span>

@endif

</td>

</tr>

<tr>

<th>Tanggal Dibuat</th>

<td>

{{ $laporan->created_at->format('d F Y H:i') }}

</td>

</tr>

</table>

<a
href="{{ route('laporan.index') }}"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Kembali

</a>

<a
href="{{ route('laporan.edit',$laporan->id) }}"
class="btn btn-warning">

<i class="fas fa-edit"></i>

Edit

</a>

</div>

</div>

</div>

</div>

<div class="card mt-3">

<div class="card-header bg-info text-white">

<h5>

<i class="fas fa-map-marker-alt"></i>

Lokasi Laporan

</h5>

</div>

<div class="card-body">

<div id="map"></div>

</div>

</div>

@stop

@section('js')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

var map=L.map('map').setView(

[

{{ $laporan->latitude }},

{{ $laporan->longitude }}

],

15

);

L.tileLayer(

'https://tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:19,

attribution:'© OpenStreetMap'

}

).addTo(map);

L.marker(

[

{{ $laporan->latitude }},

{{ $laporan->longitude }}

]

)

.addTo(map)

.bindPopup("<b>{{ $laporan->judul }}</b>")

.openPopup();

</script>

@stop