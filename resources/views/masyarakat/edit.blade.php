@extends('adminlte::page')

@section('title', 'Edit Masyarakat')

@section('content_header')
<h1>Edit Data Masyarakat</h1>
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

        <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>NIK</label>
                <input
                    type="text"
                    name="nik"
                    class="form-control"
                    value="{{ old('nik', $masyarakat->nik) }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama', $masyarakat->nama) }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label>Jenis Kelamin</label>

                <select
                    name="jenis_kelamin"
                    class="form-control"
                    required>

                    <option value="Laki-laki"
                        {{ old('jenis_kelamin', $masyarakat->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $masyarakat->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>

            </div>

            <div class="form-group mb-3">
                <label>Alamat</label>

                <textarea
                    name="alamat"
                    class="form-control"
                    rows="4"
                    required>{{ old('alamat', $masyarakat->alamat) }}</textarea>

            </div>

            <div class="form-group mb-3">
                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp', $masyarakat->no_hp) }}"
                    required>

            </div>

            <div class="form-group mb-4">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $masyarakat->email) }}">

            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>

            <a href="{{ route('masyarakat.index') }}"
               class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

        </form>

    </div>

</div>

@stop