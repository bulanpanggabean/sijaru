@extends('adminlte::page')

@section('title', 'Detail Masyarakat')

@section('content_header')
<h1>Detail Data Masyarakat</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Informasi Masyarakat</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="220">NIK</th>
                <td>{{ $masyarakat->nik }}</td>
            </tr>

            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $masyarakat->nama }}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $masyarakat->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $masyarakat->alamat }}</td>
            </tr>

            <tr>
                <th>No HP</th>
                <td>{{ $masyarakat->no_hp }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $masyarakat->email }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $masyarakat->created_at }}</td>
            </tr>

        </table>

        <a href="{{ route('masyarakat.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('masyarakat.edit', $masyarakat->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>

    </div>

</div>

@stop