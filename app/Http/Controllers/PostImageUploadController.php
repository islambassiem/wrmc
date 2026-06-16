<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostImageUploadController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('temp', 'public');

            DB::table('temp_uploads')->insert([
                'path' => $path,
                'session_token' => $request->input('session_token'),
            ]);

            return response()->json([
                'url' => $path ? Storage::url($path) : '',
            ], 200);
        }

        return response()->json(['error' => 'Upload failed'], 400);
    }
}
