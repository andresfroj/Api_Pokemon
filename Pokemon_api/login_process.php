<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new mysqli('localhost', 'root', 'f3l1xjun10r', 'pokemon_db');

    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $db->query($query);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: index.php");
        } else {
            $_SESSION['Mensaje_pw'] = 'Contraseña Incorrecta';
            header("Location: login.php");
            exit();
            //echo "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['user_error'] = 'Usuario no encontrado';
        header("Location: login.php");
        exit();
        //echo "Usuario no encontrado.";
    }

    $db->close();
}
?>
