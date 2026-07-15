@extends('adminlte::page')

@section('title', 'Tentang SIJARU')

@section('content_header')
<h1>Tentang SIJARU</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">
                    Sistem Informasi Jalan Rusak
                </h3>

            </div>

            <div class="card-body">

                <center>

                    <img src="{{ asset('images/logo.png') }}"
                         width="120"
                         class="mb-3">

                    <h2>
                        <b>SIJARU</b>
                    </h2>

                    <h5>
                        Sistem Informasi Jalan Rusak
                    </h5>

                    <span class="badge badge-success">
                        Version 1.0
                    </span>

                </center>

                <hr>

                <h4>
                    Tentang Aplikasi
                </h4>

                <p align="justify">

                    SIJARU merupakan aplikasi pelaporan jalan rusak berbasis web
                    yang dirancang untuk membantu masyarakat melaporkan
                    kerusakan jalan secara cepat, akurat, dan berbasis lokasi.

                </p>

                <p align="justify">

                    Aplikasi ini memungkinkan pengguna mengirim laporan,
                    mengunggah foto kondisi jalan, menentukan lokasi melalui
                    peta digital, serta memantau status penanganan laporan
                    secara transparan.

                </p>

                <hr>

                <h4>
                    Fitur Utama
                </h4>

                <ul>

                    <li>Dashboard Administrator</li>

                    <li>Manajemen Data Laporan</li>

                    <li>Manajemen Data Masyarakat</li>

                    <li>Upload Foto Jalan Rusak</li>

                    <li>Pemetaan Lokasi Jalan Rusak</li>

                    <li>Monitoring Status Laporan</li>

                    <li>Statistik Laporan</li>

                    <li>Cetak Laporan</li>

                </ul>

                <hr>

                <h4>
                    Pengembang
                </h4>

                <div class="alert alert-light">

                    <h3>

                        <b>BULAN K.K PANGGABEAN</b>

                    </h3>

                    <p>

                        Software Developer

                    </p>

                </div>

                <hr>

                <h4>
                    Pesan Pengembang
                </h4>

                <blockquote class="blockquote">

                    <p>

                        "Teknologi bukan hanya tentang menulis kode,
                        tetapi tentang menciptakan solusi yang
                        bermanfaat bagi banyak orang.
                        SIJARU merupakan salah satu karya yang saya
                        bangun sebagai bentuk kontribusi melalui
                        teknologi informasi."

                    </p>

                    <footer class="blockquote-footer">

                        BULAN K.K PANGGABEAN

                    </footer>

                </blockquote>

                <hr>

                <center>

                    <h5>

                        © 2026

                    </h5>

                    <h4>

                        <b>BULAN K.K PANGGABEAN</b>

                    </h4>

                    <p>

                        All Rights Reserved

                    </p>

                </center>

            </div>

        </div>

    </div>

</div>

@stop