<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\dataPasangan;
use Illuminate\Http\Request;

class dataPasanganController extends Controller
{
    public function index()
    {
        $data = dataPasangan::all();
        return view('page.dataPasangan.index', compact('data'));
    }

    public function create()
    {
        return view('page.dataPasangan.create');
    }

    public function store(Request $request)
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
            'bin' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
            'dokumen_pendukung_pria' => 'required|mimes:pdf|max:2048',
            'dokumen_pendukung_wanita' => 'required|mimes:pdf|max:2048',

        ]);

        $data = new dataPasangan();
        // pria
        $data->nama_pria = $validate['nama_pria'];
        $data->tanggal_lahir_pria = $validate['tanggal_lahir_pria'];
        $data->tempat_lahir_pria = $validate['tempat_lahir_pria'];
        $data->warga_negara_pria = $validate['warga_negara_pria'];
        $data->agama_pria = $validate['agama_pria'];
        if (!$request->dokumen_pendukung_pria) {
            $data->dokumen_pendukung_pria = $data->dokumen_pendukung_pria;
        } else {
            $validasiData['dokumen_pendukung_pria'] = $request->file('dokumen_pendukung_pria')->store('asset/dokumen_pendukung_pria', 'public');
            $data->dokumen_pendukung_pria = $validasiData['dokumen_pendukung_pria'];
        }
        // wanita
        $data->nama_wanita = $validate['nama_wanita'];
        $data->tanggal_lahir_wanita = $validate['tanggal_lahir_wanita'];
        $data->tempat_lahir_wanita = $validate['tempat_lahir_wanita'];
        $data->warga_negara_wanita = $validate['warga_negara_wanita'];
        $data->agama_wanita = $validate['agama_wanita'];
        // status
        $data->binti = $validate['binti'];
        $data->bin = $validate['bin'];
        $data->status_pernikahan = $validate['status_pernikahan'];
        if (!$request->dokumen_pendukung_wanita) {
            $data->dokumen_pendukung_wanita = $data->dokumen_pendukung_wanita;
        } else {
            $validasiData['dokumen_pendukung_wanita'] = $request->file('dokumen_pendukung_wanita')->store('asset/dokumen_pendukung_wanita', 'public');
            $data->dokumen_pendukung_wanita = $validasiData['dokumen_pendukung_wanita'];
        }
        $data->save();
        if (!$data) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/data/pasangan');
        } else {
            toastr()->success('Data has been saved successfully!');
            return redirect('/dashboard/data/pasangan');
        }
    }

    public function edit($id)
    {
        $data = dataPasangan::find($id);
        return view('page.dataPasangan.edit', compact('data'));
    }

    public function update(Request $request, $id)
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
            'bin' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
        ]);

        $id = $request->id;
        $update = dataPasangan::find($id);
        // pria
        $update->nama_pria = $validate['nama_pria'];
        $update->tanggal_lahir_pria = $validate['tanggal_lahir_pria'];
        $update->tempat_lahir_pria = $validate['tempat_lahir_pria'];
        $update->warga_negara_pria = $validate['warga_negara_pria'];
        $update->agama_pria = $validate['agama_pria'];
        // wanita
        $update->nama_wanita = $validate['nama_wanita'];
        $update->tanggal_lahir_wanita = $validate['tanggal_lahir_wanita'];
        $update->tempat_lahir_wanita = $validate['tempat_lahir_wanita'];
        $update->warga_negara_wanita = $validate['warga_negara_wanita'];
        $update->agama_wanita = $validate['agama_wanita'];
        // status
        $update->binti = $validate['binti'];
        $update->bin = $validate['bin'];
        $update->status_pernikahan = $validate['status_pernikahan'];
        $update->save();

        if (!$update) {
            toastr()->error('Data has been not edit');
            return redirect('/dashboard/data/pasangan');
        } else {
            toastr()->success('Data has been edit successfully!');
            return redirect('/dashboard/data/pasangan');
        }
    }

    public function delete($id)
    {
        if (!$id) {
            toastr()->error('Data not found');
        } else {
            $data = dataPasangan::find($id);
            if ($data) {
                $data->delete();
                toastr()->success('Data has been delete successfully!');
                return redirect()->back();
            }
        }
    }
}
