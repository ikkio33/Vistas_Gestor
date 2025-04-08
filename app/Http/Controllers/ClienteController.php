<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Turno;

class ClienteController extends Controller
{

    public function mostrarFormulario()
    {
        return view('ingresar_rut');
    }

    public function validarRut(Request $request)
    {
        $request->validate([
            'rut' => 'required|regex:/^\d{7,8}-[0-9kK]{1}$/',
        ]);

        $rut = strtoupper(trim($request->rut));


        $clienteExistente = Cliente::where('documento_id', $rut)->first();

        if ($clienteExistente) {

            return redirect()->route('seleccionar.materia', ['cliente_id' => $clienteExistente->id]);
        }

        $rutBase = substr($rut, 0, -2);
        $dv = substr($rut, -1);

        if (!$this->validarDigitoVerificador($rutBase, $dv)) {
            return redirect()->back()->withErrors(['rut' => 'El RUT ingresado no es válido.']);
        }

        $cliente = Cliente::create([
            'documento_id' => $rut,
            'nombre' => $request->input('nombre', 'Cliente sin nombre'),
        ]);

        return redirect()->route('seleccionar.materia', ['cliente_id' => $cliente->id]);
    }

    private function validarDigitoVerificador($rut, $dv)
    {
        $suma = 0;
        $multiplo = 2;

        for ($i = strlen($rut) - 1; $i >= 0; $i--) {
            $suma += $rut[$i] * $multiplo;
            $multiplo = ($multiplo == 7) ? 2 : $multiplo + 1;
        }

        $dvCalculado = 11 - ($suma % 11);
        if ($dvCalculado == 11) $dvCalculado = '0';
        if ($dvCalculado == 10) $dvCalculado = 'K';

        return strtoupper($dv) == strtoupper($dvCalculado);
    }

    public function mostrarMaterias($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        $materias = Materia::all();

        return view('seleccionar_materia', compact('cliente_id', 'materias'));
    }

    public function crearTurno(Request $request)
    {
        $cliente_id = $request->input('cliente_id');
        $materias_ids = $request->input('materias');

        if (empty($materias_ids)) {
            return redirect()->back()->withErrors(['materias' => 'Debe seleccionar al menos una materia.']);
        }

        $turnoNumero = $this->obtenerNumeroTurno();

        $turno = Turno::create([
            'cliente_id' => $cliente_id,
            'numero_turno' => $turnoNumero,
            'estado' => 'pendiente',
        ]);

        foreach ($materias_ids as $materia_id) {
            $turno->materias()->attach($materia_id);
        }

        return view('turno_confirmado', [
            'turno' => $turno,
            'materias' => Materia::whereIn('id', $materias_ids)->get(),
        ]);
    }
    private function obtenerNumeroTurno()
    {

        $ultimoTurno = Turno::orderBy('numero_turno', 'desc')->first();
        if (!$ultimoTurno) {
            $numeroTurno = 1;
        } else {
            $numeroTurno = $ultimoTurno->numero_turno + 1;
        }

        $materia = Materia::first();
        $codigoMateria = $materia ? strtoupper($materia->codigo) : 'A';
        return $codigoMateria . '-' . str_pad($numeroTurno, 3, '0', STR_PAD_LEFT);
    }
}
