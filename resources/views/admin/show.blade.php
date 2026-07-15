@extends('adminlte::page')

@section('title', 'Detail Admin')

@section('content_header')
<h1>Detail Data Admin</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Informasi Admin</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="220">Nama</th>
                <td>{{ $admin->nama }}</td>
            </tr>

            <tr>
                <th>Username</th>
                <td>{{ $admin->username }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $admin->email }}</td>
            </tr>

            <tr>
                <th>No HP</th>
                <td>{{ $admin->no_hp }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $admin->created_at }}</td>
            </tr>

        </table>

        <a href="{{ route('admin.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>

    </div>

</div>

@stop