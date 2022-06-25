<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class registerPegawaiController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('page.register.index', compact('data'));
    }
}
