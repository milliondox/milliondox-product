<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // Max 10 MB
            'name' => 'required|string|max:255',
        ]);

        $file = $request->file('file');
        $path = $file->store('files');

        Files::create([
            'name' => $request->name,
            'path' => $path,
            'folder_id' => $request->folder_id,
        ]);

        return response()->json(['message' => 'File uploaded successfully'], 201);
    }
   
    public function download($id, $name)
{
    $file = Files::findOrFail($id);

    // Ensure the file path is properly sanitized and validated
    // $filePath = Storage::path($file->path);

    
   
    $filePath = storage_path('app/' . $file->path); // Adjust path as per your file storage

    return response()->download($filePath, $file->name);
}
}
