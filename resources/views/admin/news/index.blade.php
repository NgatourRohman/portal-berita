@extends('layouts.admin')
@section('title', 'Daftar Berita')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Berita</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

    <table class="table table-bordered">
        <thead>
            <tr><th>Judul</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('news.destroy', $item->id) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
