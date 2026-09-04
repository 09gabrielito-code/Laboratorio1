<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema #1 - Área y Perímetro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        }
        label {
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 5px;
            margin: 5px 0 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Problema #1: Área y Perímetro de un Círculo</h2>

    <form method="post" action="calculadora.php">
        <label for="num1">Radio / Primer número:</label>
        <input type="text" id="num1" name="num1">

        <label for="num2">Segundo número (opcional):</label>
        <input type="text" id="num2" name="num2">

        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion">
            <option value="area_circulo">Área del Círculo</option>
            <option value="perimetro_circulo">Perímetro del Círculo</option>
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>
