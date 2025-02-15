<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindiiot()
    {
        return $this->belongsToMany(Subindiiot::class)->withPivot(['skor', 'deskripsi']);
    }

    public function subindisteam()
    {
        return $this->belongsToMany(Subindisteam::class)->withPivot(['skor', 'deskripsi']);
    }
}
