<?php

// app/Models/Usuario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Especificamos los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'email',
    ];

    // Relación uno a muchos: Un usuario puede tener muchos turnos
    public function turnos()
    {
        return $this->hasMany(Turno::class, 'usuario_id');
    }
}
