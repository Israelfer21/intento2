<?php
// Verificar si se ha enviado una respuesta
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['respuesta1'])) {
    $respuesta = $_POST['respuesta1'];
} else {
    $respuesta = "No se recibió ninguna respuesta";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Respuesta</title>
    <link rel="stylesheet" href="respuestas.css">
</head>
<body>
    <h1>Resultado de la Respuesta</h1>
    <div class="respuesta-usuario">
        <h2>Respuesta del Usuario</h2>
        <input type="text" id="respuesta_mostrada" value="<?php echo htmlspecialchars($respuesta); ?>" readonly>
    </div>
    <form action="coneccion.php" method="get">
        <button type="submit">Siguiente pregunta</button>
    </form>
</body>
</html>