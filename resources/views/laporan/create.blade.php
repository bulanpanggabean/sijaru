@extends('adminlte::page')

@section('title', 'Tambah Laporan')

@section('content_header')
<h1>Tambah Laporan Jalan Rusak</h1>
@stop

@section('content')

@section('css')
<link
rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="card">

    <div class="card-body">

        <form action="{{ route('laporan.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Judul Laporan</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          required></textarea>
            </div>

            <div class="form-group">
                <label>Foto Jalan Rusak</label>
                <input type="file"
                       name="foto"
                       class="form-control"
                       accept="image/*">
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text"
                       name="lokasi"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input type="text"
                       name="latitude"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input type="text"
                       name="longitude"
                       class="form-control"
                       required>
            </div>

            <div id="map"
            style="height:500px;">
            </div>

            <br>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('laporan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<script>

var map=L.map('map').setView(
[-2.5,118],
5
);

</script>

L.tileLayer(

'https://tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:19

}

).addTo(map);


var marker=L.marker(
[-2.5,118]
)

.addTo(map);

map.on(
'click',

function(e){

marker.setLatLng(e.latlng);

});

map.on(

'click',

function(e){

marker.setLatLng(e.latlng);

document.getElementById("latitude").value=e.latlng.lat;

document.getElementById("longitude").value=e.latlng.lng;

});


@stop