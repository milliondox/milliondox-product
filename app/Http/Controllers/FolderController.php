<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Files;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        return Folder::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Folder::create($request->only('name'));

        return response()->json(['message' => 'Folder created successfully'], 201);
    }
    public function getFiles($folderId)
    {
        // Fetch files for the specified folder
        $folder = Folder::findOrFail($folderId);
        $files = $folder->files;

        // Return files as JSON response
        return response()->json($files);
    }
    public function showFiles($folderId)
    {
        $folder = Folder::findOrFail($folderId);
    $files = $folder->files()->get(); 
        
        // Return view to display folder contents
        return view('user.Charter-Documents.showfile')->with('files', $files);
    }
}
