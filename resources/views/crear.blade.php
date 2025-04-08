@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Materia</h1>

        <form action="{{ route('admin.materias.guardar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" id="codigo" name="codigo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
        </form>
    </div>
@endsection
