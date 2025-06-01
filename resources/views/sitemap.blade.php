<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    @foreach ($news as $item)
        <url>
            <loc>{{ route('berita.show', $item->slug) }}</loc>
            <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($categories as $cat)
        <url>
            <loc>{{ route('berita.kategori', $cat->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

</urlset>
