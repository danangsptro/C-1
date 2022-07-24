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
            'foto_pria' => 'required|mimes:png,jpeg,jpg',
            // wanita
            'nama_wanita' => 'required|max:20',
            'tanggal_lahir_wanita' => 'required|max:20',
            'tempat_lahir_wanita' => 'required|max:20',
            'warga_negara_wanita' => 'required|max:20',
            'agama_wanita' => 'required|max:20',
            'foto_wanita' => 'required|mimes:png,jpeg,jpg',
            // laporan
            'binti' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
        ]);

        $data = new dataPasangan();
        // pria
        $data->nama_pria = $validate['nama_pria'];
        $data->tanggal_lahir_pria = $validate['tanggal_lahir_pria'];
        $data->tempat_lahir_pria = $validate['tempat_lahir_pria'];
        $data->warga_negara_pria = $validate['warga_negara_pria'];
        $data->agama_pria = $validate['agama_pria'];
        if(!$request->foto_pria) {
            $data->foto_pria = $data->foto_pria;
        } else {
            $validasiData['foto_pria'] = $request->file('foto_pria')->store('asset/file-foto', 'public');
            $data->foto_pria = $validasiData['foto_pria'];
        }
        // wanita
        $data->nama_wanita = $validate['nama_wanita'];
        $data->tanggal_lahir_wanita = $validate['tanggal_lahir_wanita'];
        $data->tempat_lahir_wanita = $validate['tempat_lahir_wanita'];
        $data->warga_negara_wanita = $validate['warga_negara_wanita'];
        $data->agama_wanita = $validate['agama_wanita'];
        if(!$request->foto_wanita) {
            $data->foto_wanita = $data->foto_wanita;
        } else {
            $validasiData['foto_wanita'] = $request->file('foto_wanita')->store('asset/file-foto','public');
            $data->foto_wanita = $validasiData['foto_wanita'];
        }
        // status
        $data->binti = $validate['binti'];
        $data->status_pernikahan = $validate['status_pernikahan'];
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
            'nama_pria' => 'required|max:20',
            'nama_wanita' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
        ]);

        $id = $request->id;
        $update = dataPasangan::find($id);
        $update->nama_pria = $validate['nama_pria'];
        $update->nama_wanita = $validate['nama_wanita'];
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
