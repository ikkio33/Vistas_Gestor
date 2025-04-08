<!-- resources/views/seleccionar_materia.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seleccione las Materias</h2>
    <p>Cliente ID: {{ $cliente_id }}</p>
    <form action="{{ route('crear.turno') }}" method="POST">
        @csrf
        <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">

        <div class="row text-center">
            @foreach($materias as $materia)
                <div class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materias[]" value="{{ $materia->id }}" id="materia{{ $materia->id }}">
                        <label class="form-check-label" for="materia{{ $materia->id }}">
                            {{ $materia->nombre }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-4">Crear Turno</button>
    </form>
</div>
@endsection
