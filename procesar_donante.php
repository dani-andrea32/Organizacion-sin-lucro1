<?php
// Incluye el archivo que establece la conexión con la base de datos
include "conexion.php";

// Sanitiza los datos recibidos del formulario mediante POST
$nombre = trim($_POST["nombre"]);
$email = trim($_POST["email"]);
$direccion = trim($_POST["direccion"]);
$telefono = trim($_POST["telefono"]);

// Validación: verifica que todos los campos obligatorios estén completos
if (empty($nombre) || empty($email) || empty($direccion) || empty($telefono)) {
    // Detiene la ejecución si algún campo está vacío
    die("Todos los campos son obligatorios.");
}

// Validación del correo electrónico: verifica que el formato sea válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("El correo electrónico no es válido.");
}

// Usa sentencia preparada para evitar inyecciones SQL al insertar los datos del donante
$stmt = $conn->prepare("INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $direccion, $telefono);

// Ejecuta la sentencia y verifica si la operación fue exitosa
if ($stmt->execute()) {
    // Muestra mensaje de éxito si el donante fue registrado correctamente
    echo "Donante registrado correctamente.";
} else {
    // Muestra el mensaje de error devuelto por la base de datos
    echo "Error: " . $stmt->error;
}

// Cierra la sentencia preparada y la conexión con la base de datos
$stmt->close();
$conn->close();
?>
