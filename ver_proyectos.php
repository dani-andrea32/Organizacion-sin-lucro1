<?php
// Incluye el archivo de conexión a la base de datos //
include "conexion.php";

// Si se hace clic en "Vaciar proyectos", se elimina todo el contenido de la tabla //
if (isset($_POST["vaciar"])) {
    // Ejecuta una consulta SQL para eliminar todos los registros de la tabla //
    $conn->query("DELETE FROM PROYECTO");
    // Muestra mensaje de confirmación //
    echo "<p>Todos los proyectos han sido eliminados.</p>";
}

// Consultar todos los proyectos existentes en la tabla PROYECTO //
$resultado = $conn->query("SELECT * FROM PROYECTO");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proyectos</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>

<h2>Lista de Proyectos</h2>

<?php
// Verifica si hay resultados en la consulta //
if ($resultado->num_rows > 0) {
    // Recorre cada fila de resultados y muestra la información del proyecto //
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='proyecto'>";
        echo "<strong>Nombre:</strong> " . htmlspecialchars($fila["nombre"]) . "<br>";
        echo "<strong>Presupuesto:</strong> $" . number_format($fila["presupuesto"], 2) . "<br>";
        echo "<strong>Fechas:</strong> " . $fila["fecha_inicio"] . " a " . $fila["fecha_fin"] . "<br>";
        echo "<hr>";
        echo "</div>";
    }

    // Muestra botón para vaciar la lista de proyectos //
    echo '
    <form method="POST" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar todos los proyectos?\')">
        <input type="submit" name="vaciar" value="Vaciar Proyectos" />
    </form>
    ';
} else {
    // Muestra un mensaje si no hay proyectos registrados //
    echo "<p>No hay proyectos registrados.</p>";
}
?>

<!-- Enlace para volver a la página de inicio -->
<br>
<a href="index.html">Volver al inicio</a>

</body>
</html>

<?php
// Cierra la conexión a la base de datos //
$conn->close();
?>
