<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dusun;
use App\Models\Balita;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class OrangTua extends Model
{
    use HasFactory;
    
   
    public function dusun(): BelongsTo
    {
        return $this->belongsTo(Dusun::class, 'id_dusun', 'id');
    }

    public function balita(): HasMany
    {
        return $this->hasMany(Balita::class, 'id_orangtua', 'id');
    }

}
