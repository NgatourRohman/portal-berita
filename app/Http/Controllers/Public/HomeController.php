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
        $category = Category::where('name', $slug)->firstOrFail();
        $news = $category->news()->latest()->paginate(5);

        return view('public.news', [
            'news' => $news,
            'filter' => "Kategori: $slug"
        ]);
    }
}
