<?php

namespace App\Http\Controllers;

use App\http\Models\dataJadwalPernikahan;
use App\Http\Models\dataPasangan;

class dashboardController extends Controller
{
    public function index()
    {
        $pasangan = dataPasangan::all();
        $jadwal = dataJadwalPernikahan::all();
        return view('page.home.index', compact('pasangan', 'jadwal'));
    }
}
