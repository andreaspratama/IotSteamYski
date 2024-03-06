<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subindisteam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function indikatorsteam()
    {
        return $this->belongsTo(Indikatorsteam::class);
    }

    public function kompindi()
    {
        return $this->hasMany(Kompindi::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
