<?php
// Conectar a la base de datos
// Recuperar las preguntas de la base de datos
$sql = 'SELECT * FROM preguntas';
$stmt = $db->prepare($sql);
$stmt->execute();
$preguntas = $stmt->fetchAll();

// Generar el formulario HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preguntas y respuestas</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div id="pregunta-container">
    <h1>Preguntas aleatoria</h1>
    <form action="procesar.php" method="post">
        <?php foreach ($preguntas as $pregunta): ?>
            <div>
                <p>**<?php echo $pregunta['pregunta']; ?>**</p>
                <input type="radio" name="pregunta[<?php echo $pregunta['id']; ?>]" value="a" id="respuesta_a_<?php echo $pregunta['id']; ?>">
                <label for="respuesta_a_<?php echo $pregunta['id']; ?>"> <?php echo $pregunta['respuesta_a']; ?></label><br>
                <input type="radio" name="pregunta[<?php echo $pregunta['id']; ?>]" value="b" id="respuesta_b_<?php echo $pregunta['id']; ?>">
                <label for="respuesta_b_<?php echo $pregunta['id']; ?>"> <?php echo $pregunta['respuesta_b']; ?></label><br>
                <input type="radio" name="pregunta[<?php echo $pregunta['id']; ?>]" value="c" id="respuesta_c_<?php echo $pregunta['id']; ?>">
                <label for="respuesta_c_<?php echo $pregunta['id']; ?>"> <?php echo $pregunta['respuesta_c']; ?></label><br>
                <input type="radio" name="pregunta[<?php echo $pregunta['id']; ?>]" value="d" id="respuesta_d_<?php echo $pregunta['id']; ?>">
                <label for="respuesta_d_<?php echo $pregunta['id']; ?>"> <?php echo $pregunta['respuesta_d']; ?></label><br>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Enviar">
       
         <script src=""></script>
    </form>
    </div>
</body>
</html>
