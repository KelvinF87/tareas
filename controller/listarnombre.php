<?php
include_once("../config/db.php");
session_start();
if (isset($_POST["listarNombre"])) {
    if ($_SESSION["sTipo"] == "Padre" || $_SESSION["sTipo"] == "Madre") {
        $sql = "select id, nombre from usuarios ";
    } else {
        $sql = "select id, nombre from usuarios where usuario='" . $_SESSION['sUsuario'] . " '";
    }
    $resultado = $conn->query($sql);
    if ($conn->affected_rows >= 1) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }
    } else {
        echo "<script>console.log('No hay nombre o hay un error');</script>";
    }
    $conn->close();
}
