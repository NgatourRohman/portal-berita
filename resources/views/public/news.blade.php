<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berita Terbaru - Portal Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Berita Terbaru</h1>

        @foreach ($news as $item)
            <div class="mb-5 border-bottom pb-3">
                <h3><a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a></h3>

                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid mb-2" style="max-height: 200px;">
                @endif

                <p class="text-muted">
                    <small>Kategori: {{ $news->category->name }}</small>
                </p>
                
                <p>{!! Str::limit(strip_tags($item->content), 150) !!}</p>
                <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-sm btn-outline-primary">Baca selengkapnya</a>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $news->links() }}
        </div>
    </div>
</body>
</html>
