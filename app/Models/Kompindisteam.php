<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompindisteam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindisteam()
    {
        return $this->belongsTo(Subindisteam::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
