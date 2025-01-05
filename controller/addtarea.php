<?php 
include_once '../config/db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['addtarea'])) {
    if(strlen($_POST['actividad']) > 4){ 
        $actividad = $_POST['actividad'];
        $idusuario = $_POST['idusuario'];
        $asignadapor = $_SESSION['sNombre'];
        $estado = "Pendiente";
        // Usar NOW() para obtener la fecha y hora del servidor
        $query = "INSERT INTO tareas (actividad,estado,usuario, asignada,fecha_creada) VALUES (?, ?,?,?,NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssis", $actividad, $estado, $idusuario, $asignadapor);
        if ($stmt->execute()) {
            echo "Tarea registrada correctamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "err1";
    }
}
?>
