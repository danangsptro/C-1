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
            'nama_pria' => 'required|max:20',
            'nama_wanita' => 'required|max:20',
            'status_pernikahan' => 'required|max:20',
        ]);

        $data = dataPasangan::create($request->all());
        $data->nama_pria = $validate['nama_pria'];
        $data->nama_wanita = $validate['nama_wanita'];
        $data->status_pernikahan = $validate['status_pernikahan'];
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
