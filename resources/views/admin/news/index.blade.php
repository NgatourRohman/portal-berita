@extends('layouts.admin')
@section('title', 'Daftar Berita')

@section('content')
<div class="container-fluid">
    <h1>Berita</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($news as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('news.destroy', $item->id) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada berita.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
