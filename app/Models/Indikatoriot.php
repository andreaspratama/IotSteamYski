<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikatoriot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subindiiot()
    {
        return $this->hasMany(Subindiiot::class);
    }
}
