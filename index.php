<?php
session_start();

// Reemplazar con las credenciales de tu base de datos
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "preguntas";
// Establecer la conexión con MySQL
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Recuperar una pregunta aleatoria de la base de datos
$sql = "SELECT * FROM preguntasofic ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pregunta = $result->fetch_assoc();
} else {
    echo "No se encontraron preguntas";
    exit;
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas y respuestas</title>
    <link rel="stylesheet" href="respuestas.css">
    <script>
        function enviarFormulario(event) {
            event.preventDefault();
            const respuestaSeleccionada = document.querySelector('input[name="respuesta"]:checked').value;
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'guardar.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('mensaje').innerText = xhr.responseText;
                }
            };
            xhr.send('respuesta=' + encodeURIComponent(respuestaSeleccionada));
        }
    </script>
</head>
<body>



    <h1>Verifica tus respuestas</h1>
    <div class="container">
        <h1>Preguntas y respuestas</h1>
        <div class="timer" id="timer">15</div>
        <form id="formulario-respuesta" onsubmit="enviarFormulario(event)">
            <div class="opciones">
                <h2><?php echo $pregunta['pregunta']; ?></h2>
                <input type="radio" name="respuesta" value="a" id="respuesta_a_<?php echo $pregunta['nro_pregunta']; ?>">
                <label for="respuesta_a_<?php echo $pregunta['nro_pregunta']; ?>"><?php echo $pregunta['respuesta_a']; ?></label><br>
                <input type="radio" name="respuesta" value="b" id="respuesta_b_<?php echo $pregunta['nro_pregunta']; ?>">
                <label for="respuesta_b_<?php echo $pregunta['nro_pregunta']; ?>"><?php echo $pregunta['respuesta_b']; ?></label><br>
                <input type="radio" name="respuesta" value="c" id="respuesta_c_<?php echo $pregunta['nro_pregunta']; ?>">
                <label for="respuesta_c_<?php echo $pregunta['nro_pregunta']; ?>"><?php echo $pregunta['respuesta_c']; ?></label><br>
                <input type="radio" name="respuesta" value="d" id="respuesta_d_<?php echo $pregunta['nro_pregunta']; ?>">
                <label for="respuesta_d_<?php echo $pregunta['nro_pregunta']; ?>"><?php echo $pregunta['respuesta_d']; ?></label><br>
            </div>
            <input class="text-boxes" type="submit" value="Enviar">
        </form>
        <p id="mensaje"></p>
        <form action="" method="get">
            <button type="submit">Siguiente pregunta</button>
        </form>
    </div>
    <div id="resultado"></div>
</body>
</html>
