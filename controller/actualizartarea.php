<?php
include_once '../config/db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $id = isset($_POST['idtarea']) ? $_POST['idtarea'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $nota = isset($_POST['nota']) ? $_POST['nota'] : null;

    // Validate input
    if ($id === null || $estado === null || $nota === null) {
        echo "Invalid input";
        exit;
    }


    // Update task
    $stmt = $conn->prepare("UPDATE tareas SET estado = ?, nota = ? WHERE id = ?");
    $stmt->bind_param("ssi", $estado, $nota, $id);

    if ($stmt->execute()) {
        echo "Task updated successfully";
    } else {
        echo "Error Update: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
