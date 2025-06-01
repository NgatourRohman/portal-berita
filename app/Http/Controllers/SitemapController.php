<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\News;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        $categories = Category::latest()->get();

        $xml = view('sitemap', compact('news', 'categories'))->render();

        return Response::make($xml, 200)->header('Content-Type', 'application/xml');
    }
}
