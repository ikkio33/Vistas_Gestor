<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'materia_cliente', 'materia_id', 'cliente_id');
    }

    public function turnos()
    {
        return $this->belongsToMany(Turno::class, 'turno_materia', 'materia_id', 'turno_id');
    }


    public function getCodigoMateria()
    {
        return $this->codigo;
    }
}
