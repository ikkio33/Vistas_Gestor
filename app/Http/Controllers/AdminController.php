<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Mostrar el formulario de creación de materia
    public function crearMateria()
    {
        return view('admin.materias.crear');
    }

    // Guardar una nueva materia
    public function guardarMateria(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:materias',
        ]);

        // Crear la nueva materia
        Materia::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
        ]);

        // Redirigir a la lista de materias
        return redirect()->route('admin.materias')->with('success', 'Materia creada con éxito.');
    }

    // Mostrar la lista de materias
    public function listarMaterias()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
    }

    // Editar una materia
    public function editarMateria($id)
    {
        $materia = Materia::findOrFail($id);
        return view('admin.materias.editar', compact('materia'));
    }

    // Actualizar una materia
    public function actualizarMateria(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:materias,codigo,' . $id,
        ]);

        $materia = Materia::findOrFail($id);
        $materia->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('admin.materias')->with('success', 'Materia actualizada con éxito.');
    }

    // Eliminar una materia
    public function eliminarMateria($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('admin.materias')->with('success', 'Materia eliminada con éxito.');
    }

    // Gestión de usuarios (ejemplo básico)
    public function gestionarUsuarios()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Crear un nuevo usuario
    public function crearUsuario()
    {
        return view('admin.usuarios.crear');
    }

    // Guardar un nuevo usuario
    public function guardarUsuario(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:6',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.usuarios')->with('success', 'Usuario creado con éxito.');
    }

    // Eliminar un usuario
    public function eliminarUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado con éxito.');
    }
}
