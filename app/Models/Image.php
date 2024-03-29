<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function Coins()
    {
        return $this->belongsToMany(Coin::class);
    }

    public function Marks()
    {
        return $this->belongsToMany(Mark::class);
    }
}
