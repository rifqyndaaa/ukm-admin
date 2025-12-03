<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return Media::orderBy('media_id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref_table'  => 'required|string',
            'ref_id'     => 'required|integer',
            'file_url'   => 'required|string',
            'caption'    => 'nullable|string',
            'mime_type'  => 'required|string',
            'sort_order' => 'nullable|integer',
        ]);

        return Media::create($validated);
    }

    public function show($id)
    {
        return Media::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        $media->update($request->all());

        return $media;
    }

    public function destroy($id)
    {
        Media::destroy($id);

        return response()->json(['message' => 'Media deleted']);
    }
}
