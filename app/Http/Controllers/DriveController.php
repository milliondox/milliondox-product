<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Folder;
use App\Models\Files;

class DriveController extends Controller
{
    // public function index()
    // {
    //     $cli_announcements = Announcement::where('role', 'Client')->latest()->get();
    // $folders = Folder::all();
    // $files = Files::all();
    
    // return view('user.Charter-Documents.Incorporation-Docs', compact('cli_announcements', 'folders', 'files'));
    // }
}
