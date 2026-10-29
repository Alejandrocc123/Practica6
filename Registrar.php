<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Acceso no Permitido envia el formulario.");
}

$nombre = trim($_POST["nombre"] ?? "");
$documento = trim($_POST["documento"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$programa = trim($_POST["programa"] ?? "");
$jornada = trim($_POST["jornada"] ?? "");

$errores = [];

if (mb_strlen($nombre) < 3) {$errores[] = "El nombre debe tener al menos 3 caracteres.";
}

if (!is_numeric($documento) || strlen($documento) < 6) {$errores[] = "El número de documento no es válido.";
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {$errores[] = "El correo electrónico no es válido.";
}  

if (empty($programa)) {$errores[] = "Debes ingresar el programa de formación.";
}

if (empty($jornada)) {$errores[] = "Debes seleccionar una jornada.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del registro SENA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="registro">

        <?php if (!empty($errores)): ?>

            <h1>Hay errores en el registro</h1>

            <ul>
                <?php foreach ($errores as$error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
                <?php endforeach; ?>
            </ul>

            <p><a href="index.html">Volver al formulario</a></p>

        <?php else: ?>

            <h1>¡Aprendiz Registrado!</h1>

            <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre, ENT_QUOTES, "UTF-8") ?></p>

            <p><strong>Documento:</strong> <?= htmlspecialchars($documento, ENT_QUOTES, "UTF-8") ?></p>

            <p><strong>Correo electrónico:</strong> <?= htmlspecialchars($correo, ENT_QUOTES, "UTF-8") ?></p>

            <p><strong>Programa:</strong> <?= htmlspecialchars($programa, ENT_QUOTES, "UTF-8") ?></p>

            <p><strong>Jornada:</strong> <?= htmlspecialchars($jornada, ENT_QUOTES, "UTF-8") ?></p>

            <p>Los datos son válidos y se registraron correctamente.</p>

            <p><a href="Registro.html">Volver</a></p>

        <?php endif; ?>

    </main>
</body>
</html>