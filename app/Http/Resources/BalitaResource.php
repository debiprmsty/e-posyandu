<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PenimbanganResource;

class BalitaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nik_balita" => $this->nik_balita,
            "nama_balita" => $this->nama_balita,
            "tgl_lahir" => $this->tanggal_lahir,
            "jk" => $this->jenis_kelamin,
            "ortu" => $this->ortu,
            "dusun" => $this->dusun,
            "penimbangan" => $this->penimbangan
        ];
    }
}
