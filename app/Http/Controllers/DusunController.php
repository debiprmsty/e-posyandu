<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index(){
        $data = Dusun::all();
        return view('dusun',compact('data'));
    }
    public function store(Request $request) {
        $validation = $request->validate([
            'nama_dusun' => 'required'
        ]);

        $dusun = new Dusun();
        $dusun->nama_dusun = $request->input('nama_dusun');
        $dusun->save();

        return redirect()->route('dusun.index')->with('success', 'Data Dusun berhasil ditambahkan.');
    }
    public function update(Request $request) {
        $validation = $request->validate([
            'nama_dusun' => 'required',
            'id_dusun' => 'required'
        ]);
        $newId = $request->input('id_dusun');
        $nama = $request->input('nama_dusun');


        $dusun = Dusun::find($newId);
        $dusun->nama_dusun = $nama;
        $dusun->save();

        return redirect()->route('dusun.index')->with('success', 'Data Dusun berhasil diubah.');
    }

    public function destroy($id) {
        $data = Dusun::find($id);
        $data->delete();

        return redirect()->route('dusun.index')->with('success', 'Data Dusun berhasil dihapus.');
    }
}
