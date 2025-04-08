
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Número de Turno Asignado</h5>
            <h3 class="display-4">
                {{ isset($turno->numero_turno) ? $turno->numero_turno : 'No asignado' }}
            </h3>

            <h5 class="card-title mt-4">Materias Seleccionadas</h5>
            <ul class="list-group">
                @foreach ($materias as $materia)
                <li class="list-group-item">{{ $materia->nombre }}</li>
                @endforeach
            </ul>

            <div class="mt-4">
                <a href="{{ route('ingresar.rut') }}" class="btn btn-primary">Volver al Inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection