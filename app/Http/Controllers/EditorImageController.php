<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditorImageController extends Controller
{
    /**
     * Handle image upload from TinyMCE editor
     */
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
        ]);

        try {
            $file = $request->file('file');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/editor', $filename, 'public');

            return response()->json([
                'location' => asset('storage/' . $path),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
