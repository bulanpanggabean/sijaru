@extends('adminlte::page')

@section('title', 'Tambah Admin')

@section('content_header')
<h1>Tambah Data Admin</h1>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">

    <div class="card-body">

        <form action="{{ route('admin.store') }}" method="POST">

            @csrf

            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama') }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    value="{{ old('username') }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label>No HP</label>
                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp') }}"
                    required>
            </div>

            <div class="form-group mb-4">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

        </form>

    </div>

</div>

@stop