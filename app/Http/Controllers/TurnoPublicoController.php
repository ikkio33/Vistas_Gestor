<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoPublicoController extends Controller
{
    public function index()
    {
        $turnos = Turno::with(['materias', 'usuario'])
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $turnoActual = $turnos->isNotEmpty() ? $turnos->first() : null; 

        return view('publico', compact('turnos', 'turnoActual'));
    }
}


