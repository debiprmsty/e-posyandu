<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penimbangan;
use App\Models\Dusun;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $now = date('Y-m-d');
        $firstDayOfMonth = date('Y-m-01', strtotime($now));
        $lastDayOfMonth = date('Y-m-t', strtotime($now));

        // Pie Chart
        $dataNaik = Penimbangan::where('id_keterangan', 1)
            ->whereBetween('tgl_timbangan', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();

        $dataTurun = Penimbangan::where('id_keterangan', 2)
            ->whereBetween('tgl_timbangan', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();

        $dataTetap = Penimbangan::where('id_keterangan', 3)
            ->whereBetween('tgl_timbangan', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();

        // Rata-rata berat badan
        $rataBeratBadan = Penimbangan::whereBetween('tgl_timbangan', [$firstDayOfMonth, $lastDayOfMonth])
            ->avg('berat_badan');
        $rataBeratBadan = round($rataBeratBadan, 2);

        // Rata-rata tinggi badan
        $rataTinggiBadan = Penimbangan::whereBetween('tgl_timbangan', [$firstDayOfMonth, $lastDayOfMonth])
            ->avg('tinggi_badan');
        $rataTinggiBadan = round($rataTinggiBadan, 2);

        // Bar
        $grafik = [];

        $dusuns = Dusun::all();
        foreach ($dusuns as $index => $dusun) {
            $jumlah = Penimbangan::where('id_dusun', $dusun->id)->whereBetween('tgl_timbangan', [$firstDayOfMonth, $lastDayOfMonth])->count();
            $grafik[] = $jumlah;
        }

        $grafikJson = json_encode($grafik);
        $grafikEscaped = htmlspecialchars($grafikJson);


        return view('index', compact('dataNaik', 'dataTurun', 'dataTetap', 'grafikEscaped', 'rataBeratBadan','rataTinggiBadan'));
    }
}
