<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrangTua;
use App\Models\Balita;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dusun extends Model
{
    use HasFactory;


    public function ortu(): HasMany
    {
        return $this->hasMany(OrangTua::class, 'id_dusun', 'id');
    }

    public function balita(): HasMany
    {
        return $this->hasMany(Balita::class, 'id_dusun', 'id');
    }
}
