<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dusun;
use App\Models\Balita;
use App\Models\Keterangan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penimbangan extends Model
{
    use HasFactory;

    public function dusun(): BelongsTo
    {
        return $this->belongsTo(Dusun::class, 'id_dusun', 'id');
    }
    public function balita(): BelongsTo
    {
        return $this->belongsTo(Balita::class, 'id_balita', 'id');
    }
    public function keterangan(): BelongsTo
    {
        return $this->belongsTo(keterangan::class, 'id_keterangan', 'id');
    }
}
