<?php
// Problema #2: Convertir pulgadas a centímetros
// Hlaa Na Vanna - 28/08/2026

$Pulgadas = $_POST['pulgadas'];

if (isset($Pulgadas) && is_numeric($Pulgadas)) {
    $Centimetros = $Pulgadas * 2.54;
    echo "Pulgadas ingresadas: " . $Pulgadas . "<br>";
    echo "Resultado en centímetros: " . $Centimetros . " cm";
} else {
    echo "Error: Ingrese un valor numérico válido.";
}
?>
