
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['respuesta'])) {
    $_SESSION['respuesta'] = htmlspecialchars($_POST['respuesta']);
    echo "Respuesta guardada";
} else {
    echo "No se recibió ninguna respuesta";
}
?>
