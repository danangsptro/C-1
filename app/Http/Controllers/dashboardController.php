<?php

namespace App\Http\Controllers;

use App\http\Models\dataJadwalPernikahan;
use App\Http\Models\dataPasangan;

class dashboardController extends Controller
{
    public function index()
    {
        $pasangan = dataPasangan::all();
        $approved = dataJadwalPernikahan::whereStatus('Approved')->get();
        $rejected = dataJadwalPernikahan::whereStatus('Rejected')->get();
        return view('page.home.index', compact('pasangan', 'approved', 'rejected'));
    }
}
