<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dusun;
use App\Models\Balita;
use App\Models\Penimbangan;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    // public function store(Request $request,$id)
    // {
    //     $idDusun = $id;
    //     $dataBalita = Dusun::with('balita')->where('id', $id)->first();
    //     $newData = $dataBalita->balita;
    //     return view('formpenimbangan',compact('newData','idDusun'));
    // }

    public function tambah(Request $request) {

        // $timbangan = new Penimbangan();
        // $timbangan->id_dusun = $request->input('id_dusun');
        // $timbangan->id_balita = $request->input('id_balita');
        // $timbangan->tgl_timbangan = $request->input('tgl_timbangan');
    
        // $berat_badan = $request->input('berat_badan');
        // $tinggi_badan = $request->input('tinggi_badan');

        // if($berat_badan) {
            
        // }
        $data = Balita::with('penimbangan')->get();
        return response()->json($data);

    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $dataBalita = Dusun::with('balita')->where('id', $id)->first();
        // return response()->json($dataBalita);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
