<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $news->title }} - Portal Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-4">
        <a href="{{ route('home') }}" class="btn btn-secondary mb-3">← Kembali</a>

        <h1 class="mb-3">{{ $news->title }}</h1>

        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid rounded mb-3" alt="{{ $news->title }}">
        @endif

        <article>
            {!! $news->content !!}
        </article>
    </div>
</body>
</html>
