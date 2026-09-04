<?php
// Inicializamos variables
$resultado_area = "";
$resultado_perimetro = "";
$error = "";

// Verificamos si el formulario fue enviado
if (isset($_POST['figura'], $_POST['medida1'], $_POST['medida2'])) {
    
    $figura = $_POST['figura'];
    $medida1 = $_POST['medida1']; 
    $medida2 = $_POST['medida2'];

    if (is_numeric($medida1) && is_numeric($medida2)) {
        
        switch ($figura) {
            case 'cuadrado':
                $resultado_area = $medida1 * $medida1;
                $resultado_perimetro = 4 * $medida1;
                break;
            case 'rectangulo':
                $resultado_area = $medida1 * $medida2;
                $resultado_perimetro = 2 * ($medida1 + $medida2);
                break;
            case 'circulo':
                $resultado_area = M_PI * ($medida1 * $medida1);
                $resultado_perimetro = 2 * M_PI * $medida1;
                break;
            case 'triangulo':
                $resultado_area = ($medida1 * $medida2) / 2;
                $resultado_perimetro = "Necesitas 3 lados";
                break;
            default:
                $error = "Error: Selecciona una figura válida.";
                break;
        }

        if (is_numeric($resultado_area)) $resultado_area = round($resultado_area, 2);
        if (is_numeric($resultado_perimetro)) $resultado_perimetro = round($resultado_perimetro, 2);

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
    <title>Calculadora Geométrica</title>
    <style>
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

        /* Tabla estilo Excel */
        .tabla-resultados {
            margin-top: 25px;
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #764ba2;
            background-color: #fff;
        }

        .tabla-resultados th, .tabla-resultados td {
            padding: 12px;
            border: 1px solid #e0e0e0;
            text-align: center;
            font-size: 16px;
        }

        .tabla-resultados th {
            background-color: #764ba2;
            color: white;
        }

        .tabla-resultados td {
            font-weight: bold;
            color: #333;
        }

        .error-box {
            margin-top: 25px;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            background-color: #fdecea;
            color: #d93025;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>📐 Área y Perímetro</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="figura">Figura Geométrica</label>
            <select id="figura" name="figura" required>
                <option value="cuadrado">⬜ Cuadrado</option>
                <option value="rectangulo">▭ Rectángulo</option>
                <option value="circulo">⭕ Círculo</option>
                <option value="triangulo">🔺 Triángulo</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="medida1">Medida 1 (Lado, Base o Radio)</label>
            <input type="text" id="medida1" name="medida1" placeholder="Ej: 10" required>
        </div>
        
        <div class="form-group">
            <label for="medida2">Medida 2 (Altura o Ancho) <span style="font-size: 10px; color: gray;">*En el círculo se ignora*</span></label>
            <input type="text" id="medida2" name="medida2" placeholder="Ej: 5" required>
        </div>
        
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado_area !== "" || $resultado_perimetro !== ""): ?>
        <table class="tabla-resultados">
            <thead>
                <tr>
                    <th>Cálculo</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Área</td>
                    <td><?php echo $resultado_area; ?></td>
                </tr>
                <tr>
                    <td>Perímetro</td>
                    <td><?php echo $resultado_perimetro; ?></td>
                </tr>
            </tbody>
        </table>
    <?php elseif ($error !== ""): ?>
        <div class="error-box">
            ⚠️ <?php echo $error; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
