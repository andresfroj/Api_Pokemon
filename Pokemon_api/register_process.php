<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña

    $db = new mysqli('localhost', 'root', 'f3l1xjun10r', 'pokemon_db');

    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($db->query($query)) {
        //echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
        $_SESSION['mensaje'] = '¡REGISTRO EXITOSO, YA PUEDE INICIAR SESIÓN!';
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $db->error;
    }

    $db->close();
}
?>
