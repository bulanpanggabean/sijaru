@extends('adminlte::page')

@section('title', 'Data Admin')

@section('content_header')
<h1>Data Admin</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.create') }}" class="btn btn-primary">
            + Tambah Admin
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>
                <th width="60">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th width="190">Aksi</th>
            </tr>

            </thead>

            <tbody>

            @forelse($admins as $admin)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $admin->nama }}</td>

                <td>{{ $admin->username }}</td>

                <td>{{ $admin->email }}</td>

                <td>{{ $admin->no_hp }}</td>

                <td>

                    <a href="{{ route('admin.show',$admin->id) }}"
                       class="btn btn-success btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('admin.edit',$admin->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.destroy',$admin->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus admin ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada data admin.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop