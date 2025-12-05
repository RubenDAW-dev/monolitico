<?php

namespace App\Http\Controllers;
use App\Models\Petition;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $petitions = Petition::with('files', 'category')->latest()->take(8)->get();
        return view('pages.home', compact('petitions'));
    }

}
