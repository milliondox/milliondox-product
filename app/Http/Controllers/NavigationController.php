<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class NavigationController extends Controller
{
    // Set the internal navigation session variable
    public function setInternalNavigation()
    {
        Session::put('internal_navigation', true);

        return response()->json(['status' => 'success']);
    }
    public function invite()
{
    // dd('dsfgfsdgfd');
    return view('invite');
}
}
