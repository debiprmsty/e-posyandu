<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Penimbangan;

class Bulan extends Model
{
    use HasFactory;

    public function penimbangan(): HasMany
    {
        return $this->hasMany(Penimbangan::class, 'id_bulan', 'id');
    }
}
