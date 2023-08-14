<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrangTua;
use App\Models\Dusun;
use App\Models\Penimbangan;

class Balita extends Model
{
    use HasFactory;

    public function ortu(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class, 'id_orangtua', 'id');
    }

    public function dusun(): BelongsTo
    {
        return $this->belongsTo(Dusun::class, 'id_dusun', 'id');
    }

    public function penimbangan(): HasMany
    {
        return $this->hasMany(Penimbangan::class, 'id_balita', 'id');
    }
}
