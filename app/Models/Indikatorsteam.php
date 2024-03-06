<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikatorsteam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindisteam()
    {
        return $this->hasMany(Subindisteam::class);
    }
}
