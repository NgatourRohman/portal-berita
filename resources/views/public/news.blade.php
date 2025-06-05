@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Berita Terbaru</h1>

        @php
            use Illuminate\Support\Arr;
            $categories = \App\Models\Category::all();
            $selected = request()->query('kategori', []);
        @endphp

        {{-- Filter Kategori --}}
        <div class="mb-4">
            <strong>Kategori:</strong>
            @foreach ($categories as $cat)
                @php
                    $isSelected = in_array($cat->slug, $selected);
                    $newSelection = $isSelected
                        ? array_diff($selected, [$cat->slug])
                        : array_merge($selected, [$cat->slug]);

                    $query = ['kategori' => $newSelection];
                    if (request('q')) {
                        $query['q'] = request('q');
                    }
                @endphp
                <a href="{{ route('home', $query) }}"
                    class="btn btn-sm mb-1 me-1 {{ $isSelected ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $cat->name }}
                </a>
            @endforeach

            @if ($selected)
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-danger mb-1">Reset Filter</a>
            @endif
        </div>

        {{-- Pencarian --}}
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari berita..."
                    value="{{ request('q') }}">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>

        @if (isset($filter))
            <p class="text-muted">Menampilkan: <strong>{{ $filter }}</strong></p>
        @endif

        {{-- Daftar Berita --}}
        @foreach ($news as $item)
            <div class="mb-5 border-bottom pb-3">
                <h3><a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a></h3>

                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid mb-2"
                        style="max-height: 200px;">
                @endif

                <p class="text-muted">
                    <small>Kategori: {{ $item->category->name }}</small>
                </p>

                <p>{!! Str::limit(strip_tags($item->content), 150) !!}</p>
                <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-sm btn-outline-primary">Baca
                    selengkapnya</a>
            </div>
        @endforeach

        @if (request('q'))
            <p>Hasil pencarian untuk: <strong>{{ request('q') }}</strong></p>
        @endif

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $news->links() }}
        </div>
    </div>
@endsection
