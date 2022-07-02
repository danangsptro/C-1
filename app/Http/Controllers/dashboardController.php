<?php

namespace App\Http\Controllers;

use App\Http\Models\dataPasangan;

class dashboardController extends Controller
{
    public function index()
    {
        $pasangan = dataPasangan::all();
        return view('page.home.index', compact('pasangan'));
    }
}
