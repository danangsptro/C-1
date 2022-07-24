<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\http\Models\dataJadwalPernikahan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class laporanDataPernikahanController extends Controller
{
    public function index()
    {
        $approved = dataJadwalPernikahan::whereStatus('Approved')->get();
        $rejected = dataJadwalPernikahan::whereStatus('Rejected')->get();
        return view('page.laporan.index', compact('approved', 'rejected'));
    }

    public function approved(Request $request)
    {
        $approved = dataJadwalPernikahan::whereStatus('Approved')->get();
        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));
        if ($request->start && $request->end) {
            $approved = $approved->whereBetween('tanggal_pernikahan', [$start, $end]);
        }
        return view('page.laporan.detail', compact('approved', 'start', 'end'));
    }

    public function printDataApprove(Request $request){
        $data = dataJadwalPernikahan::whereStatus('Approved')->get();
        $text = 'Laporan data sudah menikah';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('tanggal_pernikahan', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporan.cetak', compact(
            'data', 'text', 'idUser'
        ));

        return $pdf->stream("Laporan.pdf");
    }


    public function rejected(Request $request)
    {
        $rejected = dataJadwalPernikahan::whereStatus('Rejected')->get();
        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));
        if ($request->start && $request->end) {
            $rejected = $rejected->whereBetween('tanggal_pernikahan', [$start, $end]);
        }
        return view('page.laporan.detailRejected', compact('rejected', 'start', 'end'));
    }

    public function printDataNotApprove(Request $request){
        $data = dataJadwalPernikahan::whereStatus('Rejected')->get();
        $text = 'Laporan data sudah menikah';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('tanggal_pernikahan', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporan.cetak', compact(
            'data', 'text', 'idUser'
        ));

        return $pdf->stream("Laporan.pdf");
    }
}
