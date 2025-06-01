<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = News::count();
        $totalKategori = Category::count();

        return view('admin.dashboard', compact('totalBerita', 'totalKategori'));
    }
}
