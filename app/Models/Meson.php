<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meson extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
    
    protected $table = 'mesones';// El campo nombre de la tabla mesones
}

