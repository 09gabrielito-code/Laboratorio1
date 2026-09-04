<?php
// Problema #1: Área y Perímetro de un Círculo
// Hlaa Na Vanna - 28/08/2026

$Num1 = $_POST['num1'];
$Num2 = $_POST['num2'];
$Operacion = $_POST['operacion'];

if (isset($Num1) && is_numeric($Num1)) {
    
    if ($Operacion == "sumar" || $Operacion == "restar" || 
        $Operacion == "multiplicar" || $Operacion == "dividir") {
        
        if (!isset($Num2) || !is_numeric($Num2)) {
            echo "Error: Ingrese un número válido en el segundo campo.";
            exit;
        }
    }
    
    switch ($Operacion) {
        case "sumar":
            $Resultado = $Num1 + $Num2;
            echo "Resultado de la suma: " . $Resultado;
            break;
            
        case "restar":
            $Resultado = $Num1 - $Num2;
            echo "Resultado de la resta: " . $Resultado;
            break;
            
        case "multiplicar":
            $Resultado = $Num1 * $Num2;
            echo "Resultado de la multiplicación: " . $Resultado;
            break;
            
        case "dividir":
            if ($Num2 == 0) {
                echo "Error: No se puede dividir entre cero.";
            } else {
                $Resultado = $Num1 / $Num2;
                echo "Resultado de la división: " . $Resultado;
            }
            break;
            
        case "area_circulo":
            $Resultado = 3.1416 * $Num1 * $Num1;
            echo "Área del círculo (radio = $Num1): " . $Resultado;
            break;
            
        case "perimetro_circulo":
            $Resultado = 2 * 3.1416 * $Num1;
            echo "Perímetro del círculo (radio = $Num1): " . $Resultado;
            break;
            
        default:
            echo "Operación no válida.";
    }
    
} else {
    echo "Error: Ingrese un valor numérico válido.";
}
?>
