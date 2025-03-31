<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de RUT</title>
    <link rel="stylesheet" href="rutStyle.css   ">
</head>
<body>

    <div class="container">

        <h1>Ingrese su RUT</h1>
        <form action="materias.php" method="POST" onsubmit="return validateRut()">
            <div class="rut-display">
                <input type="text" name="rut" id="rut" value="" readonly required>
            </div>

            <!-- Mensaje de error si el RUT no es válido -->
            <p id="error-message" class="error-message" style="display: none;">El RUT ingresado no es válido.</p>

            <div class="buttons">
                <?php
                    // Definición de los botones de dígitos
                    for ($i = 1; $i <= 9; $i++) {
                        echo "<button type='button' class='digit-button' onclick='appendDigit($i)'>$i</button>";
                    }
                    echo "<button type='button' class='digit-button' onclick='appendDigit(\"K\")'>K</button>";
                ?>
                <button type="button" class="digit-button" onclick="appendDigit('-')">-</button> <!-- Botón para el guion -->
                <button type="button" class="digit-button" onclick="appendDigit(0)">0</button> <!-- Botón 0 después del 9 -->
                <button type="button" class="digit-button cancel-button" onclick="window.history.back()">C</button>
                <button type="button" class="digit-button clear-button" onclick="clearRut()"><</button>
                <button type="submit" class="digit-button submit-button" onclick="validateRut()">Enviar</button>
            </div>
        </form>
    </div>

    <script>
        function appendDigit(digit) {
            let rutField = document.getElementById("rut");
            rutField.value += digit;
        }

        function clearRut() {
            let rutField = document.getElementById("rut");
            rutField.value = "";
            document.getElementById("error-message").style.display = "none"; // Ocultar mensaje de error
        }

        function validateRut() {
            let rut = document.getElementById("rut").value;
            let rutRegex = /^[0-9]{7,8}-[0-9Kk]{1}$/; // Expresión regular para validar el formato del RUT

            if (!rut.match(rutRegex)) {
                document.getElementById("error-message").style.display = "block"; // Mostrar mensaje de error
                return false;
            }
            return true; // RUT válido, se puede enviar el formulario
        }
    </script>
</body>
</html>

