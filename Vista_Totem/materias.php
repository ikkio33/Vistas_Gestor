<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Materia</title>
    <link rel="stylesheet" href="styleMaterias.css">
</head>
<body>
    <div class="container">
        <h1>Seleccione una Atención</h1>
        <form action="confirmacion.php" method="POST">
            <input type="hidden" name="rut" value="<?php echo htmlspecialchars($_POST['rut']); ?>">
            <div class="buttons">
                <?php
                    // Asignamos una letra única a cada atención
                    $materias = [
                        "Consulta" => "A",
                        "Certificado" => "B",
                        "Trámite" => "C",
                        "Revisión" => "D",
                        "Reclamo" => "E"
                    ];
                    foreach ($materias as $materia => $letra) {
                        echo "<button type='submit' name='materia' value='$materia' class='digit-button'>$materia</button>";
                    }
                ?>
            </div>
            <button type="button" class="digit-button cancel-button" onclick="window.location.href='inicio.php'">Volver</button>
        </form>
    </div>
</body>
</html>

