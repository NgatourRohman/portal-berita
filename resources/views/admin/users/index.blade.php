@extends('layouts.admin')
@section('title', 'Daftar Pengguna')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $u->id) }}" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus user ini?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
