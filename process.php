<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Acceso no Permitido envia el formulario.");
}

$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$mensaje = trim($_POST["mensaje"] ?? "");

$errores = [];

if (mb_strlen($nombre) < 3) {
    $errores[] = "El nombre debe tener al menos 3 caracteres.";
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
}  

if (mb_strlen($mensaje) < 5) {
    $errores[] = "El mensaje debe tener al menos 5 caracteres.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del mensaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="registro">


            <h1>¡Mensaje recibido!</h1>

            <p>Nombre: <?= htmlspecialchars($nombre, ENT_QUOTES, "UTF-8") ?></p>

            <p>Correo electrónico: <?= htmlspecialchars($correo, ENT_QUOTES, "UTF-8") ?></p>

            <p>Mensaje: <?= htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8") ?></p>

            <p>Los datos son válidos y se recibieron correctamente.</p>

            <p><a href="index.html">Volver</a></p>

    </main>
</body>
</html>