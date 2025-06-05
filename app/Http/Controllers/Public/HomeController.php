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

        $query = News::latest();

        if ($keyword) {
            $query->where('title', 'like', "%$keyword%")
                ->orWhere('content', 'like', "%$keyword%");
        }

        $news = $query->paginate(5);

        return view('public.news', compact('news', 'keyword'));
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
