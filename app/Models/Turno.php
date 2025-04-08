<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Turno extends Model
{
    use HasFactory;

    // Especifica los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'cliente_id',    // Agrega cliente_id aquí
        'numero_turno',
        'Estado',
        'meson_id',
        // ... otros atributos que deseas permitir para la asignación masiva
    ];

    public function meson()
    {
        return $this->belongsTo(Meson::class, 'meson_id');
    }
    // Si no usas la convención de nombre para la tabla, usa esta línea
    // protected $table = 'turnos';

    // Si usas una clave primaria diferente a 'id', define la clave primaria
    // protected $primaryKey = 'turno_id';

    // Definir las relaciones

    // Relación con el modelo Usuario (un turno pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id'); // Definir la clave foránea
    }

    // Relación con el modelo Materia (muchos a muchos)
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'turno_materia', 'turno_id', 'materia_id');
    }

    // Si deseas que la relación 'usuario' se cargue siempre con los turnos, puedes agregar 'with' en el modelo:
    protected $with = ['usuario', 'materias']; // Esto es opcional, dependiendo de tus necesidades
}

