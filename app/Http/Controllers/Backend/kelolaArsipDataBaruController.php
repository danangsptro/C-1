<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\http\Models\dataJadwalPernikahan;
use App\Http\Models\dataPasangan;
use App\Http\Models\kelolaArsipDataBaru;
use Illuminate\Http\Request;

class kelolaArsipDataBaruController extends Controller
{
    public function index()
    {
        $data = dataJadwalPernikahan::queryTable();
        dd($data);
        return view('page.kelolaArsipBaru.index', compact('data'));
    }

    public function arsip($id)
    {
        $data = dataJadwalPernikahan::find($id);
        return view('page.kelolaArsipBaru.create',compact('id'));
    }

    public function createKelolaArsip(Request $request)
    {
        $validate = $request->validate([
            // pria
            'nama_pria' => 'required|max:20',
            'tanggal_lahir_pria' => 'required|max:20',
            'tempat_lahir_pria' => 'required|max:20',
            'warga_negara_pria' => 'required|max:20',
            'agama_pria' => 'required|max:20',
            // wanita
            'nama_wanita' => 'required|max:20',
            'tanggal_lahir_wanita' => 'required|max:20',
            'tempat_lahir_wanita' => 'required|max:20',
            'warga_negara_wanita' => 'required|max:20',
            'agama_wanita' => 'required|max:20',
            // laporan
            'binti' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
        ]);

        $data = new kelolaArsipDataBaru();
        // Pria
        $data->nama_pria = $validate['nama_pria'];
        $data->tanggal_lahir_pria = $validate['tanggal_lahir_pria'];
        $data->tempat_lahir_pria = $validate['tempat_lahir_pria'];
        $data->warga_negara_pria = $validate['warga_negara_pria'];
        $data->agama_pria = $validate['agama_pria'];
        // Wanita
        $data->nama_wanita = $validate['nama_wanita'];
        $data->tanggal_lahir_wanita = $validate['tanggal_lahir_wanita'];
        $data->tempat_lahir_wanita = $validate['tempat_lahir_wanita'];
        $data->warga_negara_wanita = $validate['warga_negara_wanita'];
        $data->agama_wanita = $validate['agama_wanita'];
        // Laporan
        $data->binti = $validate['binti'];
        $data->save();

        return redirect('dashboard/data-kelola-arsip-baru');
    }
}
