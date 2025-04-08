<?php

// app/Models/Cliente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento_id', // Asegúrate de que este campo se pueda asignar masivamente
        'nombre',
    ];

    // Si necesitas definir alguna relación, aquí puedes hacerlo.
    // Ejemplo si un cliente puede tener muchas materias:
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'materia_cliente', 'cliente_id', 'materia_id');
    }
}
 
