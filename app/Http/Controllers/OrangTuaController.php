<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class OrangTuaController extends Controller
{
    public function index()
    {
        $data = OrangTua::with('dusun')->get();
        $dataDusun = Dusun::with('ortu')->get();
        return view('orangtua', compact('data', 'dataDusun'));
    }
    public function store(Request $request)
    {

        $ortu = new OrangTua();

        if ($request->input('nama_bapak') == "") {
            $ortu->nama_bapak = null;
        } else if ($request->input('nama_ibu') == "") {
            $ortu->nama_ibu = null;
        }
        $ortu->nik_bapak = $request->input('nik_bapak');
        $ortu->nik_ibu = $request->input('nik_ibu');
        $ortu->nama_bapak = $request->input('nama_bapak');
        $ortu->nama_ibu = $request->input('nama_ibu');
        $ortu->id_dusun = $request->input('id_dusun');
        $ortu->save();

        return redirect()->route('ortu.index')->with('success', ' Data Orang Tua berhasil ditambahkan.');
    }

    public function getDusun($id)
    {
        $dusun = Dusun::with('ortu')->find($id);
        return response()->json(['data' => $dusun]);
    }

    public function update(Request $request)
    {
        $ortu = OrangTua::find($request->input('id_ortu'));
        $ortu->nik_bapak = $request->input('nik_bapak');
        $ortu->nik_ibu = $request->input('nik_ibu');
        $ortu->nama_bapak = $request->input('nama_bapak');
        $ortu->nama_ibu = $request->input('nama_ibu');
        $ortu->id_dusun = $request->input('id_dusun');
        $ortu->save();

        return redirect()->route('ortu.index')->with('success', 'Data Orang Tua berhasil diubah.');
    }

    public function destroy($id)
    {
        $data = OrangTua::find($id);
        $data->delete();

        return redirect()->route('ortu.index')->with('success', 'Data Orang Tua berhasil dihapus.');
    }
}
