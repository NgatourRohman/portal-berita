@extends('layouts.admin')
@section('title', 'Manajemen Kategori')

@section('content')
<div class="container-fluid">
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr><th>Nama</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $c->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
