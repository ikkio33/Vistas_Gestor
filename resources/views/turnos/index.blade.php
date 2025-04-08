<!-- resources/views/turnos/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Turnos</h1>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabla de turnos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Número de Turno</th>
                    <th>Estado</th>
                    <th>Mesón</th>
                    <th>Materias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turnos as $turno)
                    <tr>
                        <td>{{ $turno->numero_turno }}</td>
                        <td>{{ $turno->estado }}</td>
                        <td>{{ $turno->meson->nombre ?? 'No asignado' }}</td>
                        <td>
                            @foreach($turno->materias as $materia)
                                <span>{{ $materia->nombre }}</span><br>
                            @endforeach
                        </td>
                        <td>
                            <!-- Aquí puedes agregar un botón para avanzar el turno si corresponde -->
                            <a href="{{ route('turnos.avanzar', $turno->id) }}" class="btn btn-primary btn-sm">Avanzar Turno</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación (si tienes muchos turnos) -->
        <div class="mt-4">
            {{ $turnos->links() }}
        </div>
    </div>

    <!-- Agregar Bootstrap JS para funcionalidades si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
