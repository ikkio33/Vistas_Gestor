<?php
include 'db.php'; // Asegúrate de que el archivo de conexión esté bien configurado

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>
<br>
<?php
include 'db.php'; // Asegúrate de que la conexión esté bien configurada

// Consulta para verificar si hay registros en la tabla
$sql = "SELECT * FROM usuarios LIMIT 5"; // Limitar los resultados para evitar demasiados registros
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si hay registros, los mostramos
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Usuario: " . $row['usuario'] . "<br>";
    }
} else {
    echo "No se encontraron registros en la tabla usuarios.";
}

?>

<?php
include 'db.php'; // Asegúrate de que el archivo de conexión esté bien configurado
$sql = "SELECT usuario, password FROM usuarios LIMIT 5"; // Limitar los resultados para no sobrecargar
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si hay registros, mostramos el usuario y su hash de contraseña
    while ($row = $result->fetch_assoc()) {
        echo "Usuario: " . $row['usuario'] . " - Contraseña hash: " . $row['password'] . "<br>";
    }
} else {
    echo "No se encontraron registros en la tabla usuarios.";
}
?>


<?php
include 'db.php'; // Asegúrate de que la conexión esté bien configurada

// Ejemplo de usuario y contraseña ingresada
$usuario = 'admin'; // Reemplaza con el nombre de usuario real
$password = 'admin2025'; // Reemplaza con la contraseña que deseas probar

// Consulta para obtener el hash de la contraseña del usuario
$sql = "SELECT password FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($hashed_password);
$stmt->fetch();
$stmt->close();

if ($hashed_password) {
    // Verificar si la contraseña ingresada coincide con el hash
    if (password_verify($password, $hashed_password)) {
        echo "Contraseña correcta";
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
?>

