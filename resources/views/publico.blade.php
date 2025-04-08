<!-- resources/views/turnos/publico.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Turnos en Atención</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-size: 1.5rem;
        }
        .turno-card {
            margin: 10px 0;
            border: 2px solid #333;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            text-align: center;
        }
        .turno-codigo {
            font-weight: bold;
            font-size: 2rem;
            color: #0056b3;
        }
        .turno-info {
            font-size: 1.2rem;
        }
    </style>

<script>
    setInterval(() => {
        window.location.reload();
    }, 5000); // cada 5 segundos
</script>

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Turnos en Atención</h1>

        @forelse ($turnos as $turno)
            <div class="turno-card" {{ $turno->id === $turnoActual->id ? 'bg-warning' : '' }}">>
                <div class="turno-codigo">{{ $turno->codigo_turno }}</div>
                <div class="turno-info">
                    Materia: {{ $turno->materias->pluck('nombre')->join(', ') }}<br>
                    Mesón: {{ $turno->usuario->nombre ?? 'Por asignar' }}
                </div>
            </div>
        @empty
            <p class="text-center">No hay turnos en curso.</p>
        @endforelse
    </div>
</body>
</html>
