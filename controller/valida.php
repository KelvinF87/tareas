<?php
// Include database connection
include_once '../config/db.php';
if (isset($_POST['login'])) {
    $username = $_POST['usuario'];
    $password = $_POST['pass'];
    $miusuario;
    $tipo;
    $query = "SELECT clave,nombre,tipo FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword,$miusuario , $tipo);
    if ($stmt->fetch()) {
        if (password_verify($password, $hashedPassword)) {
            // echo "Login exitoso. $miusuario";
            session_start();
            $_SESSION["sNombre"] = $miusuario;
            $_SESSION["sTipo"] = $tipo;
            echo"ok";

        } else {
            echo "Contraseña o usuario incorrecto.";
        }
    } else {
        echo "Contraseña o usuario incorrecto.";
    }
    $stmt->close();
    $conn->close();
}