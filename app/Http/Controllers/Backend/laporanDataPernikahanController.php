<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\http\Models\dataJadwalPernikahan;
use Illuminate\Http\Request;

class laporanDataPernikahanController extends Controller
{
    public function index()
    {
        $approved = dataJadwalPernikahan::whereStatus('Approved')->get();
        $rejected = dataJadwalPernikahan::whereStatus('Rejected')->get();
        return view('page.laporan.index', compact('approved', 'rejected'));
    }

    public function approved()
    {
        $approved = dataJadwalPernikahan::whereStatus('Approved')->get();
        return view('page.laporan.detail', compact('approved'));
    }


    public function rejected()
    {
        $rejected = dataJadwalPernikahan::whereStatus('Rejected')->get();
        return view('page.laporan.detailRejected', compact('rejected'));
    }
}
