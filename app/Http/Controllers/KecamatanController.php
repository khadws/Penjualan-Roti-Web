<?php

namespace App\Http\Controllers;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        return response()->json($kecamatans);   
    }
}
