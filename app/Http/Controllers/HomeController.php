<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penimbangan;

class HomeController extends Controller
{
    public function index()
    {
        $dataNaik = Penimbangan::where('id_keterangan', 1)->count();
        $dataTurun = Penimbangan::where('id_keterangan', 2)->count();
        $dataTetap = Penimbangan::where('id_keterangan', 3)->count();

        return view('index', compact('dataNaik', 'dataTurun', 'dataTetap'));
    }
}
