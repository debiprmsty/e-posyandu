<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dusun;
use App\Models\Balita;
use App\Models\Penimbangan;
use Carbon\Carbon;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $idDusun = $id;
        $dataBalita = Dusun::with('balita')->where('id', $id)->first()->balita;
        $isAdd = true;
        return view('formpenimbangan', compact('dataBalita', 'idDusun', 'isAdd'));
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
        $id = $request->input('id_balita');
        $id_dusun = $request->input('id_dusun');
        $dataTerbaru = Balita::with('penimbangan')
            ->where('id', $id)
            ->first();

        if (!$dataTerbaru) {
            return response()->json(['message' => 'Data balita tidak ditemukan'], 404);
        }

        $penimbanganData = $dataTerbaru->penimbangan;

        // // Urutkan data penimbangan berdasarkan tgl_timbangan secara manual
        $penimbanganData = $penimbanganData->sortByDesc('tgl_timbangan');

        $beratBadanTerbaru = $request->input('berat_badan');
        $tinggiBadanBaru = $request->input('tinggi_badan');
        $tglBaru = $request->input('tgl_timbangan');

        if (count($penimbanganData) !== 0) {
            $tglSebelum = $penimbanganData->first()->tgl_timbangan;
        } else {
            $tglSebelum = $tglBaru;
        }
        // // Mengonversi string tanggal ke objek DateTime
        $tanggalBaru = Carbon::createFromFormat('Y-m-d', $tglBaru);
        $tanggalSebelum = Carbon::createFromFormat('Y-m-d', $tglSebelum);

        $selisihHari = $tanggalBaru->diffInDays($tanggalSebelum);


        if (count($penimbanganData) !== 0) {
            $beratBadanSebelum = $penimbanganData->first()->berat_badan;
        } else {
            $beratBadanSebelum = $beratBadanTerbaru;
        }
        $beratBadanSesudah = $beratBadanTerbaru;

        // // // Lakukan perbandingan dan ubah id_keterangan sesuai kondisi
        if ($selisihHari >= 62 || count($penimbanganData) == 0) {
            $idKeterangan = 4;
        } else if ($beratBadanSesudah == $beratBadanSebelum) {
            $idKeterangan = 3;
        } else if ($beratBadanSesudah > $beratBadanSebelum) {
            $idKeterangan = 1;
        } else if ($beratBadanSesudah < $beratBadanSebelum) {
            $idKeterangan = 2;
        }


        $timbangan = new Penimbangan();
        $timbangan->id_dusun = $id_dusun;
        $timbangan->id_balita = $request->input('id_balita');
        $timbangan->tgl_timbangan = $tglBaru;
        $timbangan->berat_badan = $beratBadanSesudah;
        $timbangan->tinggi_badan = $tinggiBadanBaru;
        $timbangan->id_keterangan = $idKeterangan;

        $timbangan->save();

        return redirect()->route('penimbangan.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function addForm(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Penimbangan::with('balita')->find($id);
        $idDusun = $data->id_dusun;
        $isAdd = false;
        $idPenimbangan = $data->id;

        $dataBalita = [];
        $dataBalita[] = [
            'id' => $data->balita->id,
            'nama_balita' => $data->balita->nama_balita,
            'tgl_timbangan' => $data->tgl_timbangan,
            'berat_badan' => $data->berat_badan,
            'tinggi_badan' => $data->tinggi_badan
        ];

        return view('formpenimbangan', compact('dataBalita', 'idDusun', 'isAdd', 'idPenimbangan'));
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
    public function update(Request $request)
    {
        $id_balita = $request->input('id_balita');
        $id_dusun = $request->input('id_dusun');
        $id_penimbangan = $request->input('id_penimbangan');
        $dataTerbaru = Balita::with('penimbangan')
            ->where('id', $id_balita)
            ->first();

        if (!$dataTerbaru) {
            return response()->json(['message' => 'Data balita tidak ditemukan'], 404);
        }

        $penimbanganData = $dataTerbaru->penimbangan;

        // Urutkan data penimbangan berdasarkan tgl_timbangan secara manual
        $penimbanganData = $penimbanganData->sortByDesc('tgl_timbangan');


        $beratBadanTerbaru = $request->input('berat_badan');
        $tinggiBadanBaru = $request->input('tinggi_badan');
        $tglBaru = $request->input('tgl_timbangan');
        $duaDataTerakhir = $penimbanganData->take(2);

        if (count($penimbanganData) !== 0) {
            $tglSebelum = $penimbanganData[0]->tgl_timbangan;
        }



        // Mengonversi string tanggal ke objek DateTime
        $tanggalBaru = Carbon::createFromFormat('Y-m-d', $tglBaru);
        $tanggalSebelum = Carbon::createFromFormat('Y-m-d', $tglSebelum);

        $selisihHari = $tanggalBaru->diffInDays($tanggalSebelum);

        if (count($penimbanganData) !== 0) {
            $beratBadanSebelum = $penimbanganData[0]->berat_badan;
        }

        // // // $pemula = count($beratBadanSebelum);
        $beratBadanSesudah = $beratBadanTerbaru;

        // // // Lakukan perbandingan dan ubah id_keterangan sesuai kondisi
        if ($selisihHari == 0 || $selisihHari >= 62) {
            $idKeterangan = 4;
        } else if ($beratBadanSesudah > $beratBadanSebelum) {
            $idKeterangan = 1;
        } else if ($beratBadanSesudah == $beratBadanSebelum) {
            $idKeterangan = 3;
        } else if ($beratBadanSesudah < $beratBadanSebelum) {
            $idKeterangan = 2;
        }


        $timbangan = Penimbangan::find($id_penimbangan);
        $timbangan->id_dusun = $id_dusun;
        $timbangan->id_balita = $request->input('id_balita');
        $timbangan->tgl_timbangan = $tglBaru;
        $timbangan->berat_badan = $beratBadanSesudah;
        $timbangan->tinggi_badan = $tinggiBadanBaru;
        $timbangan->id_keterangan = $idKeterangan;

        $timbangan->save();

        return redirect()->route('penimbangan.index')->with('success', 'Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
