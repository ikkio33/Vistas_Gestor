<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TurnoPublicoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TurnoController;

Route::get('/ingresar-rut', [ClienteController::class, 'mostrarFormulario'])->name('ingresar.rut');
Route::post('guardar-rut', [ClienteController::class, 'guardarCliente']);
Route::post('/validar-rut', [ClienteController::class, 'validarRut'])->name('validar.rut');
Route::get('/seleccionar-materia/{cliente_id}', [ClienteController::class, 'mostrarMaterias'])->name('seleccionar.materia');
Route::post('/crear-turno', [ClienteController::class, 'crearTurno'])->name('crear.turno');


//controladores de ruta para la vista publica
Route::get('/turnos', [TurnoPublicoController::class, 'index'])->name('turnos.publico');



Route::prefix('admin')->group(function () {
    // Materias
    Route::get('/materias', [AdminController::class, 'listarMaterias'])->name('admin.materias');
    Route::get('/materias/crear', [AdminController::class, 'crearMateria'])->name('admin.materias.crear');
    Route::post('/materias/guardar', [AdminController::class, 'guardarMateria'])->name('admin.materias.guardar');
    Route::get('/materias/editar/{id}', [AdminController::class, 'editarMateria'])->name('admin.materias.editar');
    Route::put('/materias/actualizar/{id}', [AdminController::class, 'actualizarMateria'])->name('admin.materias.actualizar');
    Route::delete('/materias/eliminar/{id}', [AdminController::class, 'eliminarMateria'])->name('admin.materias.eliminar');
    
    // Usuarios
    Route::get('/usuarios', [AdminController::class, 'gestionarUsuarios'])->name('admin.usuarios');
    Route::get('/usuarios/crear', [AdminController::class, 'crearUsuario'])->name('admin.usuarios.crear');
    Route::post('/usuarios/guardar', [AdminController::class, 'guardarUsuario'])->name('admin.usuarios.guardar');
    Route::delete('/usuarios/eliminar/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.usuarios.eliminar');
});


Route::get('/turnos', [TurnoController::class, 'index'])->name('turnos.index');
Route::get('/avanzar-turno', [TurnoController::class, 'avanzarTurno'])->name('turnos.avanzar');






