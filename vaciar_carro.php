<?php
session_start();
unset($_SESSION['carro_donaciones']);
header("Location:ver_carro.php");
exit;
?>
