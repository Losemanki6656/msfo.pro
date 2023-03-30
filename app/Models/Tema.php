<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    public function mavzu() 
    {
        return $this->hasMany(Mavzu::class,'tema_id');
    }

    public function videos() 
    {
        return $this->hasMany(Video::class,'tema_id');
    }

    public function video() 
    {
        return $this->hasOne(Video::class,'tema_id');
    }
}
