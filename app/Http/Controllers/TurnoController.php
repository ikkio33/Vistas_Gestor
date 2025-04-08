<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Meson;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    // Avanzar turno y asignar mesón
    public function avanzarTurno()
    {
        // Obtener el primer turno pendiente
        $turno = Turno::where('estado', 'pendiente')->first();

        if (!$turno) {
            return redirect()->route('turnos.index')->with('error', 'No hay turnos pendientes.');
        }

        // Verificar si hay un mesón disponible
        $meson = Meson::where('disponible', true)->first(); // Usa el campo disponible en lugar de estado

        // Si no hay mesón disponible, manejar el error
        if (!$meson) {
            return redirect()->route('turnos.index')->with('error', 'No hay mesones disponibles.');
        }

        // Actualizar el turno: asignar mesón y cambiar el estado a "atendido"
        $turno->update([
            'meson_id' => $meson->id,
            'estado' => 'atendido',
        ]);

        // Redirigir a la vista de los turnos con mensaje de éxito
        return redirect()->route('turnos.index')->with('success', 'Turno asignado al mesón ' . $meson->nombre . ' y avanzó.');
    }
    
    // Mostrar la lista de turnos con paginación
    public function index()
    {
        // Obtener los turnos paginados, con relación a meson y materias
        $turnos = Turno::with(['meson', 'materias'])
            ->orderBy('created_at', 'desc')
            ->paginate(10); // 10 turnos por página
        
        return view('turnos.index', compact('turnos'));
    }
}

