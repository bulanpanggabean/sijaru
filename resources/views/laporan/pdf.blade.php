<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Laporan SIJARU</title>

<style>

body{

font-family: DejaVu Sans,sans-serif;

font-size:12px;

}

.header{

text-align:center;

margin-bottom:20px;

}

.header h2{

margin:0;

}

.header p{

margin:3px;

}

table{

width:100%;

border-collapse:collapse;

margin-top:20px;

}

table th{

background:#0d6efd;

color:white;

padding:8px;

border:1px solid black;

}

table td{

padding:8px;

border:1px solid black;

vertical-align:top;

}

img{

width:90px;

height:70px;

object-fit:cover;

}

.footer{

margin-top:40px;

text-align:right;

}

</style>

</head>

<body>

<div class="header">

<img

src="{{ public_path('images/logo.png') }}"

width="90">

<h2>

SIJARU

</h2>

<h3>

Sistem Informasi Jalan Rusak

</h3>

<p>

Laporan Data Jalan Rusak

</p>

<hr>

</div>

<h2>SIJARU</h2>

<h3>Sistem Informasi Jalan Rusak</h3>

<p>Laporan Data Jalan Rusak</p>

<hr>

</div>

<table>

<thead>

<tr>

<th>No</th>

<th>Foto</th>

<th>Judul</th>

<th>Lokasi</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($laporans as $laporan)

<tr>

<td align="center">

{{ $loop->iteration }}

</td>

<td align="center">

@if($laporan->foto)

<img src="{{ public_path('storage/laporan/'.$laporan->foto) }}">

@else

-

@endif

</td>

<td>

{{ $laporan->judul }}

</td>

<td>

{{ $laporan->lokasi }}

</td>

<td align="center">

{{ $laporan->status }}

</td>

<td align="center">

{{ $laporan->created_at->format('d-m-Y') }}

</td>

</tr>

@endforeach

</tbody>

</table>

<div class="footer">

<p>

Dicetak pada :

{{ date('d F Y H:i') }}

</p>

<br><br>

<p>

Developer

<br>

<b>BULAN K.K PANGGABEAN</b>

</p>

</div>

</body>

</html>