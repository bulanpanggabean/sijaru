@extends('adminlte::page')

@section('title', 'Dashboard SIJARU')

@section('content_header')

<div class="d-flex justify-content-between">

    <div>
        <h1>
            <i class="fas fa-road text-primary"></i>
            Dashboard SIJARU
        </h1>
        <small class="text-muted">
            Sistem Informasi Jalan Rusak
        </small>
    </div>

    <div class="text-right">
        <h4 id="jam"></h4>
        <small id="tanggal"></small>
    </div>

</div>

@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>{{ $totalLaporan }}</h3>

                <p>Total Laporan</p>

            </div>

            <div class="icon">

                <i class="fas fa-file-alt"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

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

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $diproses }}</h3>

                <p>Diproses</p>

            </div>

            <div class="icon">

                <i class="fas fa-spinner"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

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

<div class="row">

    <div class="col-md-3">

        <div class="card text-center">

            <div class="card-body">

                <i class="fas fa-users fa-3x text-success mb-3"></i>

                <h3>{{ $totalMasyarakat }}</h3>

                <p>Total Masyarakat</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-center">

            <div class="card-body">

                <i class="fas fa-user-shield fa-3x text-danger mb-3"></i>

                <h3>{{ $totalAdmin }}</h3>

                <p>Total Admin</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-center">

            <div class="card-body">

                <i class="fas fa-calendar-day fa-3x text-primary mb-3"></i>

                <h3>{{ $hariIni }}</h3>

                <p>Hari Ini</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-center">

            <div class="card-body">

                <i class="fas fa-calendar-week fa-3x text-warning mb-3"></i>

                <h3>{{ $mingguIni }}</h3>

                <p>Minggu Ini</p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header bg-primary text-white">

                <h5>

                    <i class="fas fa-chart-line"></i>

                    Grafik Laporan Per Bulan

                </h5>

            </div>

            <div class="card-body">

                <canvas id="grafikBulanan" height="100"></canvas>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-header bg-success text-white">

                <h5>

                    <i class="fas fa-chart-pie"></i>

                    Persentase Status Laporan

                </h5>

            </div>

            <div class="card-body">

                <canvas id="pieStatus"></canvas>

            </div>

        </div>

    </div>

</div>
<div class="card mt-4">

    <div class="card-header bg-success text-white">

        <h5>
            <i class="fas fa-chart-line"></i>
            Progress Penyelesaian Laporan
        </h5>

    </div>

    <div class="card-body">

        <h4 class="text-center mb-3">

            {{ $progress }}%

        </h4>

        <div class="progress" style="height:30px;">

            <div
                class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                role="progressbar"
                style="width: {{ $progress }}%;">

                {{ $progress }}%

            </div>

        </div>

        <div class="row mt-4 text-center">

            <div class="col-md-4">

                <h3 class="text-warning">

                    {{ $menunggu }}

                </h3>

                <small>Menunggu</small>

            </div>

            <div class="col-md-4">

                <h3 class="text-primary">

                    {{ $diproses }}

                </h3>

                <small>Diproses</small>

            </div>

            <div class="col-md-4">

                <h3 class="text-success">

                    {{ $selesai }}

                </h3>

                <small>Selesai</small>

            </div>

        </div>

    </div>

</div>

<div class="card mt-4">

    <div class="card-header bg-primary text-white">

        <h5>

            <i class="fas fa-calendar-alt"></i>

            Statistik Laporan

        </h5>

    </div>

    <div class="card-body">

        <div class="row text-center">

            <div class="col-md-4">

                <div class="border rounded p-3">

                    <i class="fas fa-calendar-day fa-3x text-primary"></i>

                    <h2 class="mt-3">

                        {{ $hariIni }}

                    </h2>

                    <p>Hari Ini</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="border rounded p-3">

                    <i class="fas fa-calendar-week fa-3x text-success"></i>

                    <h2 class="mt-3">

                        {{ $mingguIni }}

                    </h2>

                    <p>Minggu Ini</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="border rounded p-3">

                    <i class="fas fa-calendar fa-3x text-warning"></i>

                    <h2 class="mt-3">

                        {{ $bulanIni }}

                    </h2>

                    <p>Bulan Ini</p>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="card mt-4">

    <div class="card-header bg-info text-white">

        <h5>
            <i class="fas fa-list"></i>
            5 Laporan Terbaru
        </h5>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>Judul</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

            @forelse($laporanTerbaru as $laporan)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $laporan->judul }}</td>

                    <td>{{ $laporan->lokasi }}</td>

                    <td>

                        @if($laporan->status=="Menunggu")

                            <span class="badge bg-warning">
                                Menunggu
                            </span>

                        @elseif($laporan->status=="Diproses")

                            <span class="badge bg-primary">
                                Diproses
                            </span>

                        @else

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $laporan->created_at->format('d M Y') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada laporan.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const bulanan=document.getElementById('grafikBulanan');

new Chart(bulanan,{

type:'line',

data:{

labels:[

'Jan','Feb','Mar','Apr','Mei','Jun',

'Jul','Ags','Sep','Okt','Nov','Des'

],

datasets:[{

label:'Jumlah Laporan',

data:@json($grafikBulanan),

borderColor:'#0d6efd',

backgroundColor:'rgba(13,110,253,.2)',

fill:true,

tension:.4

}]

},

options:{

responsive:true

}

});

const pie=document.getElementById('pieStatus');

new Chart(pie,{

type:'pie',

data:{

labels:[

'Menunggu',

'Diproses',

'Selesai'

],

datasets:[{

data:[

{{ $menunggu }},

{{ $diproses }},

{{ $selesai }}

],

backgroundColor:[

'#ffc107',

'#17a2b8',

'#28a745'

]

}]

},

options:{

responsive:true,

plugins:{

legend:{

position:'bottom'

}

}

}

});

function updateClock(){

const now=new Date();

document.getElementById('jam').innerHTML=

now.toLocaleTimeString('id-ID');

document.getElementById('tanggal').innerHTML=

now.toLocaleDateString('id-ID',{

weekday:'long',

day:'numeric',

month:'long',

year:'numeric'

});

}

updateClock();

setInterval(updateClock,1000);

</script>

@endsection
<div class="row mt-4">

    <div class="col-md-6">

        <div class="card card-success">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-info-circle"></i>
                    Informasi Sistem
                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="40%">Nama Aplikasi</th>
                        <td>SIJARU</td>
                    </tr>

                    <tr>
                        <th>Versi</th>
                        <td>1.0</td>
                    </tr>

                    <tr>
                        <th>Framework</th>
                        <td>Laravel 12</td>
                    </tr>

                    <tr>
                        <th>Database</th>
                        <td>MySQL</td>
                    </tr>

                    <tr>
                        <th>Developer</th>
                        <td>Bulan K.K Panggabean</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-bullseye"></i>
                    Ringkasan Dashboard
                </h3>

            </div>

            <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between">
                        Total Laporan
                        <span class="badge bg-primary">{{ $totalLaporan }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Menunggu
                        <span class="badge bg-warning">{{ $menunggu }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Diproses
                        <span class="badge bg-info">{{ $diproses }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Selesai
                        <span class="badge bg-success">{{ $selesai }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Total Admin
                        <span class="badge bg-danger">{{ $totalAdmin }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Total Masyarakat
                        <span class="badge bg-secondary">{{ $totalMasyarakat }}</span>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

<hr>

<div class="text-center text-muted mb-3">

    <strong>SIJARU - Sistem Informasi Jalan Rusak</strong><br>

    Copyright © {{ date('Y') }}

    <br>

    Developed by <b>Bulan K.K Panggabean</b>

</div>
