<?php
// Incluye el archivo que contiene los datos de conexión a la base de datos
include "conexion.php";

// Sanitiza y valida los datos recibidos mediante POST
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$presupuesto = floatval($_POST["presupuesto"]); // Convierte el valor ingresado a tipo float
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];

// Validación: verifica que ningún campo esté vacío y que el presupuesto sea mayor a 0
if (empty($nombre) || empty($descripcion) || $presupuesto <= 0 || empty($fecha_inicio) || empty($fecha_fin)) {
    // Detiene la ejecución si los datos no cumplen los requisitos mínimos
    die("Todos los campos son obligatorios y el presupuesto debe ser mayor a 0.");
}

// Usa una sentencia preparada para evitar inyecciones SQL al insertar el nuevo proyecto
$stmt = $conn->prepare("INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdss", $nombre, $descripcion, $presupuesto, $fecha_inicio, $fecha_fin);

// Ejecuta la consulta y verifica si fue exitosa
if ($stmt->execute()) {
    // Muestra mensaje de éxito si el proyecto fue registrado correctamente
    echo "Proyecto registrado de forma correcta.";
} else {
    // Muestra un mensaje de error si la inserción falla
    echo "Error al registrar el proyecto: " . $stmt->error;
}

// Cierra la sentencia preparada y la conexión con la base de datos
$stmt->close();
$conn->close();
?>
