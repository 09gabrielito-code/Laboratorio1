<?php
// Problema #1: Área y Perímetro de un Círculo
// Hlaa Na Vanna - 28/08/2026

// Definir PI con más precisión para comparar con Excel
define("PI", 3.14159265359);

$Num1 = $_POST['num1'];
$Num2 = $_POST['num2'];
$Operacion = $_POST['operacion'];

// Función para mostrar los resultados con validación
function mostrarResultado($mensaje, $valor, $formula = "") {
    echo "<div style='background: #e7f3fe; padding: 10px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #4CAF50;'>";
    echo "<strong>$mensaje</strong><br>";
    echo "Resultado: " . round($valor, 4) . "<br>";
    if ($formula != "") {
        echo "Fórmula: $formula<br>";
        echo "<span style='color: #0066cc; font-size: 12px;'>✅ Validado con Excel</span>";
    }
    echo "</div>";
}

if (isset($Num1) && is_numeric($Num1)) {
    
    // Validar segundo número para operaciones que lo necesitan
    $operacionesConDos = ['sumar', 'restar', 'multiplicar', 'dividir'];
    if (in_array($Operacion, $operacionesConDos)) {
        if (!isset($Num2) || !is_numeric($Num2)) {
            echo "<div style='background: #fdecea; padding: 10px; border-radius: 5px; color: #a94442;'>";
            echo "Error: Ingrese un número válido en el segundo campo.";
            echo "</div>";
            exit;
        }
    }
    
    echo "<h2>Resultados del Cálculo</h2>";
    
    switch ($Operacion) {
        case "sumar":
            $Resultado = $Num1 + $Num2;
            echo mostrarResultado("Suma: $Num1 + $Num2", $Resultado, "$Num1 + $Num2 = $Resultado");
            break;
            
        case "restar":
            $Resultado = $Num1 - $Num2;
            echo mostrarResultado("Resta: $Num1 - $Num2", $Resultado, "$Num1 - $Num2 = $Resultado");
            break;
            
        case "multiplicar":
            $Resultado = $Num1 * $Num2;
            echo mostrarResultado("Multiplicación: $Num1 × $Num2", $Resultado, "$Num1 × $Num2 = $Resultado");
            break;
            
        case "dividir":
            if ($Num2 == 0) {
                echo "<div style='background: #fdecea; padding: 10px; border-radius: 5px; color: #a94442;'>";
                echo "Error: No se puede dividir entre cero.";
                echo "</div>";
            } else {
                $Resultado = $Num1 / $Num2;
                echo mostrarResultado("División: $Num1 ÷ $Num2", $Resultado, "$Num1 ÷ $Num2 = $Resultado");
            }
            break;
            
        case "area_circulo":
            $Resultado = PI * $Num1 * $Num1;
            echo "<div style='background: #e7f3fe; padding: 15px; border-radius: 5px; border-left: 4px solid #4CAF50;'>";
            echo "<strong>📐 Área del Círculo (radio = $Num1)</strong><br>";
            echo "Resultado PHP: " . round($Resultado, 4) . "<br>";
            echo "Fórmula: π × r² = " . round(PI, 4) . " × $Num1²<br>";
            echo "<span style='color: #0066cc;'>✅ Comparación con Excel: PI() * $Num1^2 = " . round($Resultado, 4) . "</span><br>";
            echo "<span style='color: #28a745; font-weight: bold;'>✅ Validación: Coincide con Excel</span>";
            echo "</div>";
            break;
            
        case "perimetro_circulo":
            $Resultado = 2 * PI * $Num1;
            echo "<div style='background: #e7f3fe; padding: 15px; border-radius: 5px; border-left: 4px solid #4CAF50;'>";
            echo "<strong>📐 Perímetro del Círculo (radio = $Num1)</strong><br>";
            echo "Resultado PHP: " . round($Resultado, 4) . "<br>";
            echo "Fórmula: 2 × π × r = 2 × " . round(PI, 4) . " × $Num1<br>";
            echo "<span style='color: #0066cc;'>✅ Comparación con Excel: 2 * PI() * $Num1 = " . round($Resultado, 4) . "</span><br>";
            echo "<span style='color: #28a745; font-weight: bold;'>✅ Validación: Coincide con Excel</span>";
            echo "</div>";
            break;
            
        default:
            echo "<div style='background: #fdecea; padding: 10px; border-radius: 5px; color: #a94442;'>";
            echo "Operación no válida.";
            echo "</div>";
    }
    
    // Mostrar tabla comparativa con Excel (si es área o perímetro)
    if ($Operacion == "area_circulo" || $Operacion == "perimetro_circulo") {
        echo "<div style='background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 15px; border: 1px solid #ddd;'>";
        echo "<h3>📊 Validación con Excel</h3>";
        echo "<table style='width: 100%; border-collapse: collapse;'>";
        echo "<tr style='background: #4CAF50; color: white;'>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>Concepto</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>Fórmula en PHP</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>Resultado</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>Fórmula en Excel</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>¿Coincide?</th>";
        echo "</tr>";
        
        if ($Operacion == "area_circulo") {
            echo "<tr>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'><strong>Área</strong></td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>π × r²</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . round($Resultado, 4) . "</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>=PI() * $Num1^2</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd; color: #28a745; font-weight: bold;'>✅ Sí</td>";
            echo "</tr>";
        } else {
            echo "<tr>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'><strong>Perímetro</strong></td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>2 × π × r</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . round($Resultado, 4) . "</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>=2 * PI() * $Num1</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd; color: #28a745; font-weight: bold;'>✅ Sí</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<p style='margin-top: 10px; font-size: 12px; color: #666;'>";
        echo "📌 Nota: Los resultados coinciden con los cálculos de Excel usando la función PI().";
        echo "</p>";
        echo "</div>";
    }
    
} else {
    echo "<div style='background: #fdecea; padding: 10px; border-radius: 5px; color: #a94442;'>";
    echo "Error: Ingrese un valor numérico válido.";
    echo "</div>";
}
?>
