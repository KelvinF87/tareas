<?php
// Include database connection
include_once '../config/db.php';

if (isset($_POST['accion'])) {
    $nombre = $_POST['nombre'];
    $tipo= $_POST['tipo'];
    $username = $_POST['usuario'];
    $password = $_POST['pass'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO usuarios (nombre,usuario, clave,tipo) VALUES (?, ?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss",$nombre, $username, $hashedPassword,$tipo);
    if ($stmt->execute()) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}


// Function to register a new user
function registerUser($username, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $hashedPassword);
    if ($stmt->execute()) {
        return "User registered successfully.";
    } else {
        return "Error: " . $stmt->error;
    }
}

// Function to register a new task
function registerTask($userId, $taskDescription) {
    global $conn;
    $query = "INSERT INTO tasks (user_id, description) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $userId, $taskDescription);
    if ($stmt->execute()) {
        return "Task registered successfully.";
    } else {
        return "Error: " . $stmt->error;
    }
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo registerUser($username, $password);
    } elseif (isset($_POST['register_task'])) {
        $userId = $_POST['user_id'];
        $taskDescription = $_POST['task_description'];
        echo registerTask($userId, $taskDescription);
    }
}
?>