<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KeteranganResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "lb_keterangan" => $this->label_keterangan,
            "nm_keterangan" => $this->nama_keterangan
        ];
    }
}
