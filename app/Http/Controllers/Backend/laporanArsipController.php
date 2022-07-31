<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\kelolaArsipDataBaru;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class laporanArsipController extends Controller
{
    public function index()
    {
        $arsipBaru = kelolaArsipDataBaru::whereJenisArsip('Arsip Baru')->get();
        $arsipLama = kelolaArsipDataBaru::whereJenisArsip('Arsip Lama')->get();
        return view('page.laporanArsip.index', compact('arsipBaru', 'arsipLama'));
    }

    public function arsipBaru(Request $request)
    {
        $arsipBaru = kelolaArsipDataBaru::whereJenisArsip('Arsip Baru')->get();
        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));
        if ($request->start && $request->end) {
            $arsipBaru = $arsipBaru->whereBetween('tanggal_pernikahan', [$start, $end]);
        }
        return view('page.laporanArsip.detailArsipBaru', compact('arsipBaru', 'start', 'end'));
    }

    public function printKelolaArsipBaru(Request $request)
    {
        $data = kelolaArsipDataBaru::whereJenisArsip('Arsip Baru')->get();
        $text = 'Laporan Kelola Arsip Baru';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('tanggal_pernikahan', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporanArsip.cetakArsip', compact(
            'data',
            'text',
            'idUser'
        ));

        return $pdf->stream("Laporan-arsip-baru.pdf");
    }

    public function arsipLama(Request $request)
    {
        $arsipLama = kelolaArsipDataBaru::whereJenisArsip('Arsip Lama')->get();
        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));
        if ($request->start && $request->end) {
            $arsipLama = $arsipLama->whereBetween('tanggal_pernikahan', [$start, $end]);
        }
        return view('page.laporanArsip.detailArsipLama', compact('arsipLama', 'start', 'end'));
    }

    public function printKelolaArsipLama(Request $request)
    {
        $data = kelolaArsipDataBaru::whereJenisArsip('Arsip Lama')->get();
        $text = 'Laporan Kelola Arsip Lama';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('tanggal_pernikahan', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporanArsip.cetakArsip', compact(
            'data',
            'text',
            'idUser'
        ));

        return $pdf->stream("Laporan-arsip-lama.pdf");
    }
}
