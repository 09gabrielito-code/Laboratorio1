<?php
// Inicializamos variables
$resultado = "";
$error = "";

// Verificamos si el formulario fue enviado
if (isset($_POST['num1'], $_POST['num2'], $_POST['operacion'])) {
    
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];

    if (is_numeric($num1) && is_numeric($num2)) {
        
        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                break;
            case 'division':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    $error = "Error: No se puede dividir entre cero.";
                }
                break;
            default:
                $error = "Error: Operación no válida.";
                break;
        }
    } else {
        $error = "Error: Ingrese un valor numérico válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Moderna</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        /* Tarjeta principal */
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 30px;
            color: #764ba2;
            font-size: 24px;
            letter-spacing: 1px;
        }

        /* Estilos de los grupos de inputs */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }

        input:focus, select:focus {
            border-color: #764ba2;
            outline: none;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.2);
        }

        /* Botón */
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
        }

        button:active {
            transform: translateY(1px);
        }

        /* Cajas de resultado y error */
        .result-box, .error-box {
            margin-top: 25px;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50px;
            word-break: break-all;
        }

        .result-box {
            background-color: #e6f4ea;
            color: #1e7e34;
            border: 1px solid #c3e6cb;
        }

        .error-box {
            background-color: #fdecea;
            color: #d93025;
            border: 1px solid #f5c6cb;
        }

        /* Icono pequeño en el resultado */
        .icono {
            margin-right: 10px;
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>🧮 Calculadora PHP</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="num1">Número 1</label>
            <input type="text" id="num1" name="num1" placeholder="Ej: 10" required>
        </div>
        
        <div class="form-group">
            <label for="operacion">Operación</label>
            <select id="operacion" name="operacion" required>
                <option value="suma">➕ Suma (+)</option>
                <option value="resta">➖ Resta (-)</option>
                <option value="multiplicacion">✖️ Multiplicación (×)</option>
                <option value="division">➗ División (÷)</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="num2">Número 2</label>
            <input type="text" id="num2" name="num2" placeholder="Ej: 5" required>
        </div>
        
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <div class="result-box">
            <span class="icono">✅</span>
            <span>Resultado: <?php echo $resultado; ?></span>
        </div>
    <?php elseif ($error !== ""): ?>
        <div class="error-box">
            <span class="icono">⚠️</span>
            <span><?php echo $error; ?></span>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
