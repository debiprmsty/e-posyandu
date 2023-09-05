<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DusunController extends Controller
{
    public function index()
    {
        $data = Dusun::all();
        return view('dusun', compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_dusun' => 'required'
        ]);

        $validator->after(function ($validator) use ($request) {
            // Cek apakah nama_dusun kosong
            if (empty($request->input('nama_dusun'))) {
                $validator->errors()->add('nama_dusun', 'Nama dusun tidak boleh kosong.');
            }
        });

        if ($validator->fails()) {
            return redirect()->route('dusun.index')
                ->withErrors($validator)
                ->withInput();
        }

        $dusun = new Dusun();
        $dusun->nama_dusun = $request->input('nama_dusun');
        $dusun->save();

        return redirect()->route('dusun.index')->with('success', 'Data Dusun berhasil ditambahkan.');
    }
    public function update(Request $request)
    {
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

    public function destroy($id)
    {
        $data = Dusun::find($id);
        $data->delete();

        return redirect()->route('dusun.index')->with('success', 'Data Dusun berhasil dihapus.');
    }
}
