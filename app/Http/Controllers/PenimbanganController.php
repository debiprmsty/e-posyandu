<?php

namespace App\Http\Controllers;

use App\Models\Penimbangan;
use App\Models\Dusun;
use Illuminate\Http\Request;
use App\Http\Resources\PenimbanganResource;
use App\Exports\PenimbanganExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penimbangan::with(['dusun', 'balita', 'keterangan'])->get();
        $dataDusun = Dusun::all();
        return view('penimbangan', compact('data', 'dataDusun'));
    }

    public function exportExcel(Request $request)
    {
        $id_dusun = $request->input('id_dusun');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $no = 1;

        $dusun = Dusun::find($id_dusun);
        $bulan_awal = Carbon::parse($tgl_awal)->translatedFormat('F');
        $bulan_akhir = Carbon::parse($tgl_akhir)->translatedFormat('F');

        $bulan_awal = ucfirst($bulan_awal);
        $bulan_akhir = ucfirst($bulan_akhir);

        return (new PenimbanganExport($no, $id_dusun, $tgl_awal, $tgl_akhir))->download('LAPORAN ' . strtoupper($dusun->nama_dusun) . ' ' . $bulan_awal . ' - ' . $bulan_akhir . '.' . 'xls');
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
    public function showByDusun(Request $request, Penimbangan $penimbangan)
    {
        $idDusun = $request->input('id_dusun');
        $tambahSiap = true;
        $judulSiap = true;
        if ($idDusun == 0) {
            $data = Penimbangan::with(['dusun', 'balita', 'keterangan'])->get();
            $dataDusun = Dusun::all();
            $judulSiap = false;
        } else {
            $dataDusun = Dusun::all();
            $data = Penimbangan::with(['dusun', 'balita', 'keterangan'])->where('id_dusun', '=', $idDusun)->get();
        }


        return view('penimbangan', compact('data', 'dataDusun', 'tambahSiap', 'judulSiap', 'idDusun'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penimbangan $penimbangan)
    {
        //
    }

    public function form($id)
    {
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
    public function destroy(Penimbangan $penimbangan, $id)
    {
        $data = Penimbangan::find($id);
        $data->delete();

        return redirect()->route('penimbangan.index')->with('success', 'Data Penimbangan berhasil dihapus.');
    }
}
