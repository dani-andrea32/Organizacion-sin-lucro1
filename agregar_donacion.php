<?php
session_start();

// Verifica si el formulario fue enviado por POST //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Sanitiza los datos recibidos //
   $campania = htmlspecialchars(trim($_POST["campania"]));
   $monto = floatval($_POST["monto"]);

   // Validación básica //
   if ($campania !== "" && $monto > 0) {

       // Si no existe el carro, se crea //
       if (!isset($_SESSION["carro_donaciones"])) {
           $_SESSION["carro_donaciones"] = [];
        }

        $encontrado = false;

        // Recorremos el carro para verificar si ya existe la campaña //
        foreach ($_SESSION["carro_donaciones"] as $index => $item) {
            if ($item["campania"] === $campania) {
                // Si ya existe, se suma el monto //
                $_SESSION["carro_donaciones"][$index]["monto"] += $monto;
                $encontrado = true;
                break;
            }
        }

        // Si no se encontro la campaña, se agrega nueva entrada //
        if (!$encontrado){
            $_SESSION["carro_donaciones"][] = [
                "campania" => $campania,
                "monto" => $monto  
            ];
        }
    }

    header("Location: ver_carro.php");
    exit;
}
?>
