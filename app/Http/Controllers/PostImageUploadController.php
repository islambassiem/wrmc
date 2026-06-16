<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImageUploadController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // 2. Store the file to the 'public' disk inside an 'editor-uploads' directory
            $path = $request->file('image')->store('posts', 'public');

            // 3. Return the public asset URL back to Quill editor
            return response()->json([
                'url' => $path ? Storage::url($path) : '',
            ], 200);
        }

        return response()->json(['error' => 'Upload failed'], 400);
    }
}
