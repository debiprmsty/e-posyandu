<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BalitaResource;

class DusunResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nama_dusun" => $this->nama_dusun,
            "balita" => BalitaResource::collection($this->balita)
        ];
    }
}
