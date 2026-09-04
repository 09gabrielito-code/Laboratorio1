<?php
// Problema #2: Convertir pulgadas a centímetros
// Hlaa Na Vanna - 28/08/2026

$resultado = "";
$error = "";

// Verificamos si el formulario fue enviado
if (isset($_POST['pulgadas'])) {
    $Pulgadas = $_POST['pulgadas'];

    if (is_numeric($Pulgadas)) {
        $Centimetros = $Pulgadas * 2.54;
        // Guardamos el resultado formateado
        $resultado = number_format($Centimetros, 2) . " cm";
    } else {
        $error = "Error: Ingrese un valor numérico válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema #2 - Conversión Directa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        /* Estilos para los mensajes */
        .resultado-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3fe;
            border: 1px solid #b6d4fe;
            border-radius: 5px;
            color: #0c5460;
            font-weight: bold;
        }
        .error-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #fdecea;
            border: 1px solid #f5c2c0;
            border-radius: 5px;
            color: #a94442;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>📏 Pulgadas a Centímetros</h2>

    <!-- Formulario que se envía a sí mismo -->
    <form method="post" action="">
        <div class="form-group">
            <label for="pulgadas">Ingrese las pulgadas:</label>
            <input type="text" id="pulgadas" name="pulgadas" placeholder="Ej: 5.5" required>
        </div>
        
        <input type="submit" value="Convertir">
    </form>

    <!-- Mostramos el resultado o el error aquí mismo -->
    <?php if ($resultado !== ""): ?>
        <div class="resultado-box">
            ✅ Resultado: <?php echo $resultado; ?>
        </div>
    <?php elseif ($error !== ""): ?>
        <div class="error-box">
            ⚠️ <?php echo $error; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
