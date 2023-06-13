<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindi()
    {
        return $this->belongsToMany(Subindi::class)->withPivot(['skor', 'deskripsi']);
    }
}
