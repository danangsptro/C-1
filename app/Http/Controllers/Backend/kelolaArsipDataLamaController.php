<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\kelolaArsipDataBaru;
use Illuminate\Http\Request;

class kelolaArsipDataLamaController extends Controller
{
    public function index()
    {
        $data = kelolaArsipDataBaru::all();
        return view('page.kelolaArsipLama.index', compact('data'));
    }

    public function create()
    {
        return view('page.kelolaArsipLama.create');
    }

    public function createKelolaArsiplama(Request $request)
    {
        $validate = $request->validate([
            'no_akta' => 'required|max:20',
            'nama_pria' => 'required|max:20',
            'tanggal_lahir_pria' => 'required|max:20',
            'tempat_lahir_pria' => 'required|max:20',
            'warga_negara_pria' => 'required|max:20',
            'nama_wanita' => 'required|max:20',
            'tanggal_lahir_wanita' => 'required|max:20',
            'tempat_lahir_wanita' => 'required|max:20',
            'warga_negara_wanita' => 'required|max:20',
            'binti' => 'required|max:20',
            'status_arsip' => 'required|max:20',
            'tanggal_pernikahan' => 'required|max:20',
            'tempat_pernikahan' => 'required|max:20',
            'jenis_arsip' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
        ]);

        $data = new kelolaArsipDataBaru;
        $data->no_akta = $validate['no_akta'];
        $data->nama_pria = $validate['nama_pria'];
        $data->tanggal_lahir_pria = $validate['tanggal_lahir_pria'];
        $data->tempat_lahir_pria = $validate['tempat_lahir_pria'];
        $data->warga_negara_pria = $validate['warga_negara_pria'];
        $data->nama_wanita = $validate['nama_wanita'];
        $data->tanggal_lahir_wanita = $validate['tanggal_lahir_wanita'];
        $data->tempat_lahir_wanita = $validate['tempat_lahir_wanita'];
        $data->warga_negara_wanita = $validate['warga_negara_wanita'];
        $data->binti = $validate['binti'];
        $data->status_arsip = $validate['status_arsip'];
        $data->tanggal_pernikahan = $validate['tanggal_pernikahan'];
        $data->tempat_pernikahan = $validate['tempat_pernikahan'];
        $data->jenis_arsip = $validate['jenis_arsip'];
        $data->status_pernikahan = $validate['status_pernikahan'];
        $data->save();

        toastr()->success('Data has been Arsip successfully!');
        return redirect('dashboard/data-kelola-arsip-lama');
    }
}
