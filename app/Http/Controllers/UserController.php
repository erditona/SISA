<?php

namespace App\Http\Controllers;

use App\Models\TempatSampah;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tempatsampahs = TempatSampah::all();

        return view('welcome', compact('tempatsampahs'));
    }

    public function show($id)
    {
        $tempatsampah = TempatSampah::findOrFail($id);
        return view('detail', compact('tempatsampah'));
    }

    public function alldatalokasi()
    {
        $tempatsampahs = TempatSampah::all();

        return view('alldatalokasi', compact('tempatsampahs'));
    }
}
