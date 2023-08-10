<?php

namespace App\Http\Controllers;

use App\Models\Penimbangan;
use App\Models\Dusun;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    public function index(){
        $data = Penimbangan::all();
        $dataDusun = Dusun::all();
        return view('penimbangan',compact('data','dataDusun'));
    }
}
