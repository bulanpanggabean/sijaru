@extends('adminlte::page')

@section('title', 'Data Laporan')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1>
        <i class="fas fa-road"></i>
        Data Laporan Jalan Rusak
    </h1>

    <div>

        <a href="{{ route('laporan.pdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i>
            Export PDF
        </a>

        <a href="{{ route('laporan.excel') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i>
            Export Excel
        </a>

    </div>

</div>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>

    <i class="fas fa-check-circle"></i>

    {{ session('success') }}

</div>

@endif

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-list"></i>

            Data Laporan

        </h3>

    </div>

    <div class="card-body">

        <form method="GET" action="{{ route('laporan.index') }}">

            <div class="row">

                <div class="col-md-3 mb-2">

                    <a href="{{ route('laporan.create') }}"
                       class="btn btn-primary btn-block">

                        <i class="fas fa-plus"></i>

                        Tambah Laporan

                    </a>

                </div>

                <div class="col-md-3 mb-2">

                    <input
                        type="text"
                        name="cari"
                        class="form-control"
                        placeholder="Cari Judul / Lokasi..."
                        value="{{ request('cari') }}">

                </div>

                <div class="col-md-2 mb-2">

                    <select
                        name="status"
                        class="form-control">

                        <option value="">Semua Status</option>

                        <option value="Menunggu"
                            {{ request('status') == 'Menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="Diproses"
                            {{ request('status') == 'Diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="Selesai"
                            {{ request('status') == 'Selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                    </select>

                </div>

                <div class="col-md-2 mb-2">

                    <input
                        type="date"
                        name="tanggal_awal"
                        class="form-control"
                        value="{{ request('tanggal_awal') }}">

                </div>

                <div class="col-md-2 mb-2">

                    <input
                        type="date"
                        name="tanggal_akhir"
                        class="form-control"
                        value="{{ request('tanggal_akhir') }}">

                </div>

            </div>

            <div class="row mt-2">

                <div class="col-md-12 text-right">

                    <button type="submit" class="btn btn-success">

                        <i class="fas fa-search"></i>

                        Cari

                    </button>

                    <a href="{{ route('laporan.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-sync"></i>

                        Reset

                    </a>

                </div>

            </div>

        </form>

        <hr>
        <div class="table-responsive">

    <table class="table table-bordered table-hover">

        <thead class="thead-dark">

            <tr class="text-center">

                <th width="50">No</th>
                <th width="120">Foto</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th width="170">Kode Laporan</th>
                <th width="120">Status</th>
                <th width="170">Tanggal</th>
                <th width="250">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($laporans as $laporan)

        <tr>

            <td class="text-center">

                {{ $loop->iteration }}

            </td>

            <td class="text-center">

                @if($laporan->foto)

                    <img
                        src="{{ asset('storage/laporan/'.$laporan->foto) }}"
                        class="img-thumbnail"
                        style="width:90px;height:70px;object-fit:cover;">

                @else

                    <span class="text-muted">

                        Tidak Ada Foto

                    </span>

                @endif

            </td>

            <td>

                <strong>{{ $laporan->judul }}</strong>

                <br>

                <small class="text-muted">

                    {{ Str::limit($laporan->deskripsi,60) }}

                </small>

            </td>

            <td>

                {{ $laporan->lokasi }}

            </td>

            <td class="text-center">

                @if($laporan->kode_laporan)

                    <span class="badge badge-primary">

                        {{ $laporan->kode_laporan }}

                    </span>

                @else

                    <span class="badge badge-danger">

                        Belum Ada

                    </span>

                @endif

            </td>

            <td class="text-center">

                @if($laporan->status=="Menunggu")

                    <span class="badge badge-warning">

                        Menunggu

                    </span>

                @elseif($laporan->status=="Diproses")

                    <span class="badge badge-info">

                        Diproses

                    </span>

                @else

                    <span class="badge badge-success">

                        Selesai

                    </span>

                @endif

            </td>

            <td class="text-center">

                {{ $laporan->created_at->format('d-m-Y') }}

                <br>

                <small>

                    {{ $laporan->created_at->format('H:i') }}

                </small>

            </td>

            <td class="text-center">

                <a href="{{ route('laporan.show',$laporan->id) }}"
                   class="btn btn-info btn-sm">

                    <i class="fas fa-eye"></i>

                    Detail

                </a>

                <a href="{{ route('laporan.edit',$laporan->id) }}"
                   class="btn btn-warning btn-sm">

                    <i class="fas fa-edit"></i>

                    Edit

                </a>

                <form
                    action="{{ route('laporan.destroy',$laporan->id) }}"
                    method="POST"
                    style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Yakin ingin menghapus laporan ini?')"
                        class="btn btn-danger btn-sm">

                        <i class="fas fa-trash"></i>

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8" class="text-center text-muted">

                Belum ada data laporan.

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>
        <div class="mt-3">

            <small class="text-muted">

                Total Data :
                <b>{{ $laporans->count() }}</b> Laporan

            </small>

        </div>

    </div>

</div>

@stop

@section('css')

<style>

.table td,
.table th{
    vertical-align:middle;
}

.img-thumbnail{
    border-radius:10px;
}

.badge{
    font-size:13px;
    padding:7px 10px;
}

.card{
    border-radius:12px;
}

.btn{
    border-radius:8px;
}

</style>

@stop

@section('js')

<script>

$(function(){

    $('.table').DataTable({

        responsive:true,

        autoWidth:false,

        pageLength:10,

        language:{

            search:"Cari :",

            lengthMenu:"Tampilkan _MENU_ data",

            zeroRecords:"Data tidak ditemukan",

            info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            infoEmpty:"Belum ada data",

            paginate:{
                first:"Awal",
                last:"Akhir",
                next:"›",
                previous:"‹"
            }

        }

    });

});

</script>

@stop