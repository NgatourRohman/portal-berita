<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
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
        $news = News::where('slug', $slug)->firstOrFail();
        return view('public.detail', compact('news'));
    }
}
