<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompindi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindi()
    {
        return $this->belongsTo(Indikator::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
