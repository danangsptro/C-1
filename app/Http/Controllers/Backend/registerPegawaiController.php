<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerPegawaiController extends Controller
{
    public function index()
    {
        $role = Auth::user()->user_role;

        $q = Auth::user()->id;
        $data = User::when($role === 'penghulu', function ($query) use($q) {
            return $query->where('id', $q);
        })->get();
        return view('page.register.index', compact('data'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->user_role = $request->user_role;
        $user->password = Hash::make($request->password);

        $user->save();

        if ($user) {
            toastr()->success('Data has been saved successfully!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        if (!$id) {
            toastr()->error('Data not found');
        } else {
            $data = User::find($id);
            if ($data) {
                $data->delete();
                toastr()->success('Data has been delete successfully!');
                return redirect()->back();
            }
        }
    }
}
