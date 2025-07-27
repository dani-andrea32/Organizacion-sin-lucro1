<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
   <head>
       <meta charset="UTF-8">
       <title>Carro de donaciones</title>
        <link rel="stylesheet" href="styles.css" />
   </head>
   <body>
       <h2>Carro de Donaciones</h2>


       <?php
       if (!empty($_SESSION["carro_donaciones"])) {
           echo "<ul>";
           $total = 0;
           foreach ($_SESSION["carro_donaciones"] as $item) {
               echo "<li><strong>Campaña:</strong> {$item["campania"]} - <strong>Monto:</strong> $ {$item["monto"]}</li>";
               $total += $item["monto"];
           }
           echo "</ul>";
           echo "<p><strong>Total:</strong> $ $total</p>";
       } else {
           echo "<p>No existen donaciones en el carro.</p>";
       }
       ?>


       <br>
       <a href="agregar_donacion.html">Agregar otra donación</a> |
       <a href="index.html">Volver al inicio</a> |
       <a href="vaciar_carro.php">Vaciar el carro</a>
   </body>
</html>
