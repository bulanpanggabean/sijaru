@extends('adminlte::page')

@section('title','Peta Laporan SIJARU')

@section('content_header')

<div class="d-flex justify-content-between">

    <h1>
        <i class="fas fa-map-marked-alt"></i>
        Peta Laporan Jalan Rusak
    </h1>

    <a href="{{ route('laporan.index') }}" class="btn btn-primary">
        <i class="fas fa-list"></i>
        Data Laporan
    </a>

</div>

@stop


@section('css')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.awesome-markers/2.0.4/leaflet.awesome-markers.css"/>

<link rel="stylesheet"
href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css"/>

<link rel="stylesheet"
href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css"/>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

body{

background:#f4f6f9;

}

#map{

height:700px;

border-radius:12px;

}

.card{

border:none;

border-radius:15px;

box-shadow:0px 5px 20px rgba(0,0,0,.08);

}

.small-box{

border-radius:15px;

}

.legend{

padding:15px;

background:white;

border-radius:10px;

margin-top:20px;

box-shadow:0px 2px 10px rgba(0,0,0,.1);

}

.legend h5{

font-weight:bold;

margin-bottom:15px;

}

.legend span{

display:inline-block;

margin-right:25px;

font-size:15px;

font-weight:bold;

}

.popup-img{

width:250px;

height:170px;

object-fit:cover;

border-radius:10px;

margin-bottom:10px;

}

.info-panel{

background:white;

padding:15px;

border-radius:10px;

margin-bottom:20px;

box-shadow:0px 2px 10px rgba(0,0,0,.08);

}

.search-box{

margin-bottom:20px;

}

</style>

@stop


@section('content')

<div class="row">

<div class="col-lg-3 col-6">

<div class="small-box bg-primary">

<div class="inner">

<h3>{{ $total }}</h3>

<p>Total Laporan</p>

</div>

<div class="icon">

<i class="fas fa-road"></i>

</div>

</div>

</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-warning">

<div class="inner">

<h3>{{ $menunggu }}</h3>

<p>Menunggu</p>

</div>

<div class="icon">

<i class="fas fa-clock"></i>

</div>

</div>

</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-info">

<div class="inner">

<h3>{{ $diproses }}</h3>

<p>Diproses</p>

</div>

<div class="icon">

<i class="fas fa-cogs"></i>

</div>

</div>

</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-success">

<div class="inner">

<h3>{{ $selesai }}</h3>

<p>Selesai</p>

</div>

<div class="icon">

<i class="fas fa-check-circle"></i>

</div>

</div>

</div>

</div>

<div class="card">

<div class="card-header bg-primary text-white">

<h4>

<i class="fas fa-map"></i>

Peta Persebaran Jalan Rusak

</h4>

</div>

<div class="card-body">

<div class="row">

<div class="col-md-3">

<div class="info-panel">

<h5>

<i class="fas fa-filter"></i>

Filter Status

</h5>

<select
id="statusFilter"
class="form-control">

<option value="Semua">

Semua Status

</option>

<option value="Menunggu">

Menunggu

</option>

<option value="Diproses">

Diproses

</option>

<option value="Selesai">

Selesai

</option>

</select>

<hr>

<button
id="btnLokasi"
class="btn btn-success btn-block">

<i class="fas fa-location-arrow"></i>

Lokasi Saya

</button>

<br><br>

<button
id="btnReset"
class="btn btn-secondary btn-block">

<i class="fas fa-sync"></i>

Reset Zoom

</button>

</div>
<div class="col-md-9">

<div class="card mb-3">

<div class="card-header bg-primary text-white">

Legenda Status

</div>

<div class="card-body">

<span class="badge bg-warning">

Menunggu

</span>

<span class="badge bg-primary">

Diproses

</span>

<span class="badge bg-success">

Selesai

</span>

</div>

</div>

<div id="map"></div>

<div class="row mt-4">

<div class="col-md-3">

<div class="small-box bg-primary">

<div class="inner">

<h3>{{ $total }}</h3>

<p>Total Laporan</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="small-box bg-warning">

<div class="inner">

<h3>{{ $menunggu }}</h3>

<p>Menunggu</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="small-box bg-info">

<div class="inner">

<h3>{{ $diproses }}</h3>

<p>Diproses</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="small-box bg-success">

<div class="inner">

<h3>{{ $selesai }}</h3>

<p>Selesai</p>

</div>

</div>

</div>

</div>

<div class="legend">

<h5>

<i class="fas fa-info-circle"></i>

Keterangan Marker

</h5>

<span>🟠 Menunggu</span>

<span>🔵 Diproses</span>

<span>🟢 Selesai</span>

</div>

</div>

</div>

</div>

</div>

@stop


@section('js')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.awesome-markers/2.0.4/leaflet.awesome-markers.js"></script>

<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>

<script>

var map=L.map('map');

var osm=L.tileLayer(

'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:19,

attribution:'© OpenStreetMap'

}

);

var satellite=L.tileLayer(

'https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',

{

maxZoom:20,

subdomains:['mt0','mt1','mt2','mt3']

}

);

osm.addTo(map);

var baseMaps={

"Street":osm,

"Satellite":satellite

};

L.control.layers(baseMaps).addTo(map);

L.control.scale().addTo(map);

var markers=L.markerClusterGroup();

var semuaMarker=[];

@foreach($laporan as $row)

var warna='red';

if("{{ $row->status }}"=="Menunggu"){

warna='orange';

}

if("{{ $row->status }}"=="Diproses"){

warna='blue';

}

if("{{ $row->status }}"=="Selesai"){

warna='green';

}

var icon=L.AwesomeMarkers.icon({

icon:'road',

prefix:'fa',

markerColor:warna

});

var marker=L.marker(

[

{{ $row->latitude }},

{{ $row->longitude }}

],

{

icon:icon

}

)

.bindPopup(`
<center>

@if($row->foto)

<img
src="{{ asset('storage/laporan/'.$row->foto) }}"
class="popup-img">

@endif

<h4>{{ $row->judul }}</h4>

<hr>

<table class="table table-sm table-bordered">

<tr>

<th width="90">Lokasi</th>

<td>{{ $row->lokasi }}</td>

</tr>

<tr>

<th>Status</th>

<td>

@if($row->status=="Menunggu")

<span class="badge badge-warning">

{{ $row->status }}

</span>

@endif

@if($row->status=="Diproses")

<span class="badge badge-primary">

{{ $row->status }}

</span>

@endif

@if($row->status=="Selesai")

<span class="badge badge-success">

{{ $row->status }}

</span>

@endif

</td>

</tr>

<tr>

<th>Latitude</th>

<td>{{ $row->latitude }}</td>

</tr>

<tr>

<th>Longitude</th>

<td>{{ $row->longitude }}</td>

</tr>

</table>

<a

href="https://www.google.com/maps?q={{ $row->latitude }},{{ $row->longitude }}"

target="_blank"

class="btn btn-primary btn-sm btn-block">

<i class="fas fa-map-marker-alt"></i>

Buka Google Maps

</a>

</center>

`);

marker.status="{{ $row->status }}";

markers.addLayer(marker);

semuaMarker.push(marker);

@endforeach

map.addLayer(markers);

if(semuaMarker.length>0){

var group=new L.featureGroup(semuaMarker);

map.fitBounds(group.getBounds().pad(0.2));

}

document.getElementById("btnReset").onclick=function(){

if(semuaMarker.length>0){

var group=new L.featureGroup(semuaMarker);

map.fitBounds(group.getBounds().pad(0.2));

}

};

document.getElementById("statusFilter").addEventListener("change",function(){

var pilih=this.value;

markers.clearLayers();

semuaMarker.forEach(function(marker){

if(pilih=="Semua"){

markers.addLayer(marker);

}

else if(marker.status==pilih){

markers.addLayer(marker);

}

});

});
document.getElementById("btnLokasi").onclick=function(){

    if(!navigator.geolocation){

        alert("Browser tidak mendukung GPS.");

        return;

    }

    navigator.geolocation.getCurrentPosition(

        function(position){

            var lat=position.coords.latitude;

            var lng=position.coords.longitude;

            map.setView([lat,lng],16);

            L.marker([lat,lng],{

                icon:L.AwesomeMarkers.icon({

                    icon:'user',

                    prefix:'fa',

                    markerColor:'red'

                })

            })

            .addTo(map)

            .bindPopup("<b>Lokasi Saya</b>")

            .openPopup();

        },

        function(){

            alert("Lokasi tidak dapat diakses.");

        }

    );

};

map.on('click',function(e){

    console.log(

        "Latitude : "+e.latlng.lat+

        " Longitude : "+e.latlng.lng

    );

});

</script>

@stop