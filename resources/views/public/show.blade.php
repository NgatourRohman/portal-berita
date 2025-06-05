@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1>{{ $berita->title }}</h1>

        <p class="text-muted">
            <small>Kategori: {{ $berita->category->name }}</small>
        </p>

        @if ($berita->image)
            <img src="{{ asset('storage/' . $berita->image) }}" class="img-fluid mb-3" style="max-height: 300px;">
        @endif

        <div class="mb-3">
            {!! $berita->content !!}
        </div>

        <a href="{{ route('home') }}" class="btn btn-outline-primary">← Kembali ke Berita</a>
    </div>
@endsection
