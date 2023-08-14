<?php

namespace App\Http\Controllers;

use App\Models\Penimbangan;
use App\Models\Dusun;
use Illuminate\Http\Request;
use App\Http\Resources\PenimbanganResource;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penimbangan::with(['dusun','balita','keterangan'])->get();
        $dataDusun = Dusun::all();
        return view('penimbangan',compact('data','dataDusun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showByDusun(Request $request,Penimbangan $penimbangan)
    {
        $idDusun = $request->input('id_dusun');
        $tambahSiap = true;
        $judulSiap = true;
        if($idDusun == 0) {
            $data = Penimbangan::with(['dusun','balita','keterangan'])->get();
            $dataDusun = Dusun::all();
            $judulSiap = false;
        }else {
            $dataDusun = Dusun::all();
            $data = Penimbangan::with(['dusun','balita','keterangan'])->where('id_dusun','=',$idDusun)->get();
        }
        
        return view('penimbangan',compact('data', 'dataDusun','tambahSiap','judulSiap','idDusun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penimbangan $penimbangan)
    {
        //
    }

    public function form($id) {
        return view('formpenimbangan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penimbangan $penimbangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penimbangan $penimbangan)
    {
        //
    }
}
