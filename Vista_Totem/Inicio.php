<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla de Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $logoPath = "img/logo.png"; // Cambia esto con la ruta de tu logo
    ?>
    <img src="<?php echo $logoPath; ?>" alt="Logo" class="logo">
    <a href="rut.php" class="continue-button">
        <div class="circle">
            <div class="circle-inner"></div>
        </div>
        <span>Apretar aquí para continuar</span>
    </a>
</body>
</html>