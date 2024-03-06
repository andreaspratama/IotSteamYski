<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompindiiot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindiiot()
    {
        return $this->belongsTo(Subindiiot::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
