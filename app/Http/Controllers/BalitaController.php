<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\OrangTua;
use App\Models\Dusun;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function index(){
        $data = Balita::with('dusun')->with('ortu')->get();
        return view('balita',compact('data'));
    }

    public function getDataOrtu() {
        $ortu = OrangTua::all();
        return response()->json(['data' => $ortu]);
    }

    public function getDusunOrtu($id) {
        $ortu = OrangTua::with('dusun')->find($id);
        $dusunOrtu = $ortu->dusun;
        return response()->json(['data' => $dusunOrtu]);
    }

    public function store(Request $request) {
        
        $balita = new Balita();
        $balita->id_orangtua = $request->input('id_orangtua');
        $balita->id_dusun = $request->input('id_dusun');
        $balita->nik_balita = $request->input('nik_balita');
        $balita->nama_balita = $request->input('nama_balita');
        $balita->tanggal_lahir = $request->input('tanggal_lahir');
        $balita->jenis_kelamin = $request->input('jenis_kelamin');
        $balita->save();

        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil ditambahkan.');
    }

    public function update(Request $request) {
        
        $balita = Balita::find($request->input('id_balita'));
        $balita->id_orangtua = $request->input('id_orangtua');
        $balita->id_dusun = $request->input('id_dusun');
        $balita->nik_balita = $request->input('nik_balita');
        $balita->nama_balita = $request->input('nama_balita');
        $balita->tanggal_lahir = $request->input('tanggal_lahir');
        $balita->jenis_kelamin = $request->input('jenis_kelamin');
        $balita->save();

        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil diubah.');
    }

    public function destroy($id) {
        $data = Balita::find($id);
        $data->delete();

        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil dihapus.');
    }
}
