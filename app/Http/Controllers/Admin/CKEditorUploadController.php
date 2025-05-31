<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

class CKEditorUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('ckeditor', 'public');
            $url = asset('storage/' . $path);
            return response()->json([
                'url' => $url,
            ]);
        }

        return response()->json(['error' => 'Gagal upload'], 400);
    }
}
