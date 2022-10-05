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


    public function editKelolaArsip($id)
    {
        $data = kelolaArsipDataBaru::find($id);
        return view('page.laporanArsip.edit-arsip', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'no_akta' => 'required|max:30',
            'nama_pria' => 'required|max:50',
            'nama_wanita' => 'required|max:50',
            'tanggal_lahir_pria' => 'required|max:20',
            'tanggal_lahir_wanita' => 'required|max:20',
            'tempat_lahir_pria' => 'required|max:20',
            'tempat_lahir_wanita' => 'required|max:20',
            'warga_negara_pria' => 'required|max:20',
            'warga_negara_wanita' => 'required|max:20',
            'tanggal_pernikahan' => 'required|max:20',
            'tempat_pernikahan' => 'required|max:100',
            'status_arsip' => 'required|max:20',
            'binti' => 'required|max:20',
            'bin' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
            'jenis_arsip' => 'required|max:30'
        ]);
        $id = $request->id;
        $update = kelolaArsipDataBaru::find($id);
        $update->no_akta = $validate['no_akta'];
        $update->nama_pria = $validate['nama_pria'];
        $update->nama_wanita = $validate['nama_wanita'];
        $update->tanggal_lahir_pria = $validate['tanggal_lahir_pria'];
        $update->tanggal_lahir_wanita = $validate['tanggal_lahir_wanita'];
        $update->tempat_lahir_pria = $validate['tempat_lahir_pria'];
        $update->tempat_lahir_wanita = $validate['tempat_lahir_wanita'];
        $update->warga_negara_pria = $validate['warga_negara_pria'];
        $update->warga_negara_wanita = $validate['warga_negara_wanita'];
        $update->tanggal_pernikahan = $validate['tanggal_pernikahan'];
        $update->tempat_pernikahan = $validate['tempat_pernikahan'];
        $update->status_arsip = $validate['status_arsip'];
        $update->binti = $validate['binti'];
        $update->bin = $validate['bin'];
        $update->status_pernikahan = $validate['status_pernikahan'];
        $update->jenis_arsip = $validate['jenis_arsip'];
        $update->save();

        if (!$update) {
            toastr()->error('Data has been not edit');
            return redirect('/dashboard/detail-arsip-baru');
        } else {
            toastr()->success('Data has been edit successfully!');
            return redirect('/dashboard/detail-arsip-baru');
        }
    }
}
