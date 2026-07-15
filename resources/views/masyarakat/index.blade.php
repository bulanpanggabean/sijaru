@extends('adminlte::page')

@section('title','Data Masyarakat')

@section('content_header')
<h1>Data Masyarakat</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('masyarakat.create') }}" class="btn btn-primary">
            + Tambah Masyarakat
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Email</th>
                <th width="180">Aksi</th>
            </tr>

            </thead>

            <tbody>

            @forelse($masyarakats as $masyarakat)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $masyarakat->nik }}</td>

                <td>{{ $masyarakat->nama }}</td>

                <td>{{ $masyarakat->jenis_kelamin }}</td>

                <td>{{ $masyarakat->no_hp }}</td>

                <td>{{ $masyarakat->email }}</td>

                <td>

                    <a href="{{ route('masyarakat.show',$masyarakat->id) }}"
                       class="btn btn-success btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('masyarakat.edit',$masyarakat->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('masyarakat.destroy',$masyarakat->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center">

                    Belum ada data masyarakat.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop