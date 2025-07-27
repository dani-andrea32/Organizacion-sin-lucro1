<?php
// Incluye el archivo de conexión a la base de datos //
include "conexion.php";

// Si se presiona el botón "Vaciar Donantes", se eliminan todos los registros de la tabla DONANTE //
if (isset($_POST["vaciar"])) {
    $conn->query("DELETE FROM DONANTE"); // Consulta SQL para eliminar todos los donantes //
    echo "<p>Todos los donantes han sido eliminados.</p>"; // Mensaje de confirmación //
}

// Realiza una consulta para obtener todos los donantes registrados //
$resultado = $conn->query("SELECT * FROM DONANTE");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Donantes</title>
    <!-- Enlace a la hoja de estilos CSS -->
    <link rel="stylesheet" href="styles.css" />
</head>
<body>

<h2>Lista de Donantes</h2>

<?php
// Verifica si hay resultados en la consulta //
if ($resultado->num_rows > 0) {
    // Recorre los resultados y muestra la información de cada donante //
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='donante'>";
        echo "<strong>Nombre:</strong> " . htmlspecialchars($fila["nombre"]) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($fila["email"]) . "<br>";
        echo "<strong>Teléfono:</strong> " . htmlspecialchars($fila["telefono"]) . "<br>";
        echo "<hr>";
        echo "</div>";
    }

    // Formulario para eliminar todos los donantes (con confirmación) //
    echo '
    <form method="POST" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar todos los donantes?\')">
        <input type="submit" name="vaciar" value="Vaciar Donantes" />
    </form>
    ';
} else {
    // Muestra un mensaje si no hay donantes registrados //
    echo "<p>No hay donantes registrados.</p>";
}
?>

<!-- Enlace para volver a la página principal -->
<br>
<a href="index.html">Volver al inicio</a>

</body>
</html>

<?php
// Cierra la conexión a la base de datos //
$conn->close();
?>
