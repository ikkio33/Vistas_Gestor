@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Materia</h1>

        <form action="{{ route('admin.materias.actualizar', $materia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $materia->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $materia->codigo }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        </form>
    </div>
@endsection
