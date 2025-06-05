<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');
        $kategori = $request->query('kategori'); // bisa array

        $query = News::latest();

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                    ->orWhere('content', 'like', "%$keyword%");
            });
        }

        if ($kategori && is_array($kategori)) {
            $query->whereHas('category', function ($q) use ($kategori) {
                $q->whereIn('slug', $kategori);
            });
        }

        $news = $query->paginate(5);
        $selectedCategories = $kategori ?? [];

        return view('public.news', compact('news', 'keyword', 'selectedCategories'));
    }


    public function show($slug)
    {
        $berita = News::where('slug', $slug)->firstOrFail();

        return view('public.show', compact('berita'));
    }

    public function kategori($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $news = $category->news()->latest()->paginate(5);

        return view('public.news', [
            'news' => $news,
            'filter' => "Kategori: $category->name"
        ]);
    }
}
