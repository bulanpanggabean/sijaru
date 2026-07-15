@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Dashboard Admin SIJARU</h1>
@stop

@section('content')
<div class="row">

    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>0</h3>
                <p>Total Laporan</p>
            </div>
            <div class="icon">
                <i class="fas fa-road"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>0</h3>
                <p>Menunggu</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>0</h3>
                <p>Selesai</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Selamat Datang</h3>
    </div>

    <div class="card-body">
        <h4>{{ Auth::user()->name }}</h4>

        <p>Role :
            {{ Auth::user()->getRoleNames()->first() }}
        </p>

        <p>Selamat datang di Sistem Informasi Jalan Rusak (SIJARU).</p>
    </div>
</div>
@stop