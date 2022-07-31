<?php

namespace App\Http\Controllers;

use App\http\Models\dataJadwalPernikahan;
use App\Http\Models\dataPasangan;
use App\Http\Models\kelolaArsipDataBaru;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $pasangan = dataPasangan::all();
        $approved = dataJadwalPernikahan::whereStatus('Approved')->get();
        $rejected = dataJadwalPernikahan::whereStatus('Rejected')->get();
        $arsipBaru = kelolaArsipDataBaru::whereJenisArsip('Arsip Baru')->get();
        $arsipLama = kelolaArsipDataBaru::whereJenisArsip('Arsip Lama')->get();
        return view('page.home.index', compact('pasangan', 'approved', 'rejected', 'arsipBaru', 'arsipLama'));
    }
}
