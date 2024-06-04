<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta Recibida</title>
    <link rel="stylesheet" href="respuestas.css">
</head>
<body>
    <h1>Respuesta Recibida</h1>
    <?php if (isset($_SESSION['respuesta'])) { ?>
        <input type="text" value="<?php echo htmlspecialchars($_SESSION['respuesta']); ?>" readonly>
    <?php } else { ?>
        <p>No se ha recibido ninguna respuesta.</p>
    <?php } ?>
</body>
</html>
