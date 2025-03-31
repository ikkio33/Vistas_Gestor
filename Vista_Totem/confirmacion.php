<?php
session_start();

// Recibir los datos del formulario
$rut = isset($_POST['rut']) ? htmlspecialchars($_POST['rut']) : '';
$materia = isset($_POST['materia']) ? htmlspecialchars($_POST['materia']) : '';

// Asignar letras según el tipo de atención
$letras_atencion = [
    "Consulta" => "A",
    "Certificado" => "B",
    "Trámite" => "C",
    "Revisión" => "D",
    "Reclamo" => "E"
];

// Generar número de atención único (simulado con sesión)
if (!isset($_SESSION['contador_atencion'])) {
    $_SESSION['contador_atencion'] = 1;
} else {
    $_SESSION['contador_atencion']++;
}

$letra_asignada = isset($letras_atencion[$materia]) ? $letras_atencion[$materia] : 'X';
$numero_atencion = $letra_asignada . "-" . $_SESSION['contador_atencion'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Atención</title>
    <link rel="stylesheet" href="confirmacionSyle.css">
</head>
<body>
    <div class="container">
        <h1>Turno Asignado</h1>
        <p><strong>RUT:</strong> <?php echo $rut; ?></p>
        <p><strong>Atención Seleccionada:</strong> <?php echo $materia; ?></p>
        <p class="turno"><strong>Su Número de Atención:</strong> <?php echo $numero_atencion; ?></p>

        <button class="digit-button" onclick="window.location.href='inicio.php'">Finalizar</button>
    </div>
</body>
</html>
