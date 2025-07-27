<?php
include "clase_evento.php";

// Verifica si se envió el formulario de forma correcta //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recuperación y sanitización de datos del formulario //
  $descripcion = htmlspecialchars($_POST["descripcion"]);
  $tipo = htmlspecialchars($_POST["tipo"]);
  $lugar = htmlspecialchars($_POST["lugar"]);
  $fecha = $_POST["fecha"];
  $hora = $_POST["hora"];


  // Validar formato de fecha: YYYY-MM-DD
  $validaFecha = preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha);


  // Validar formato de hora: HH:MM (24 horas)
  $validaHora = preg_match("/^([01]\d|2[0-3]):([0-5]\d)$/", $hora);


  if ($validaFecha && $validaHora) {
    // Crear instancia del evento //
    $evento = new Evento($descripcion, $tipo, $lugar, $fecha, $hora);
    $resultado = $evento->mostrar();
  } else {
    $resultado = "<p>Error: El formato de fecha u hora no es válido.</p>";
  }
} else {
  $resultado = "<p>No se han recibido datos del formulario.</p>";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Registro de un nuevo evento</title>
</head>
<body>
   <?php echo $resultado; ?>
   <br>
   <a href="index.html">Volver al sitio principal</a>
</body>
</html>
