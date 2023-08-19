<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BalitaResource;
use App\Http\Resources\BulanResource;
use App\Http\Resources\KeteranganResource;
use App\Models\Balita;
use App\Models\Bulan;
use App\Models\Keterangan;

class PenimbanganResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "tanggal_penimbangan" => $this->tgl_timbangan,
            "berat_badan" => $this->berat_badan,
            "tinggi_badan" => $this->tinggi_badan,
            "dusun" => $this->dusun,
            "balita" => new BalitaResource($this->balita),
            "keterangan" => $this->keterangan
        ];
    }
}
