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
