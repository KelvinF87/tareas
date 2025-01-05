<?php
include_once("../config/db.php");
session_start();
if (isset($_POST["listarTarea"])) {
    $alternate = true; // Variable de control para alternar colores
    $backgroundClass = $alternate ? 'background-color-1' : 'background-color-2';
    $alternate = !$alternate; // Cambiar el valor de la variable de control

    if ($_SESSION["sTipo"] == "Padre" || $_SESSION["sTipo"] == "Madre") {

        $sql = "select tareas.nota as nota, tareas.estado as estado, tareas.fecha as fecha, tareas.id as idtarea, tareas.actividad as actividad,tareas.estado as estado, usuarios.nombre as nombre, tareas.asignada as creador  
        from tareas  left join usuarios on usuarios.id = tareas.usuario
        where tareas.estado = 'Pendiente' or tareas.estado = 'Proceso' ";
        $resultado = $conn->query($sql);
        if ($conn->affected_rows >= 1) {


            while ($row = $resultado->fetch_assoc()) {
                // Alternar la clase de fondo
                if ($row['estado'] == 'Pendiente') {
                    $background = 'background-color-rojo';
                } else {
                    $background = 'background-color-amarillo';
                }
                echo "
                <div class='$backgroundClass'>
                    <li><span>Fecha: </span>" . $row['fecha'] . "</li>
                    <li><span>Tarea: </span>" . $row['actividad'] . "</li>
                    <li><span>Creada Por: </span>" . $row['creador'] . "</li>
                    <li><span>Para: </span>" . $row['nombre'] . "</li>
                    <li><span>Nota:<span class='$background'> " . $row['estado'] . "</span> </span><input style='width: 100%;' type='text' id='nota" . $row['idtarea'] . "' value='" . $row['nota'] . "' placeholder='Agregar nota'/></li>
                    <li><button class='btnRealizada' data-idtarea='" . $row['idtarea'] . "'>Realizada</button> <button class='btnProceso' data-idtarea='" . $row['idtarea'] . "'>Proceso</button></li>
                    <br>
                </div>";
            }
        } else {
            echo "<script>console.log('No hay Datos');</script>";
        }
        $conn->close();
    } else {
        $sql = "select tareas.nota as nota, tareas.estado as estado, tareas.fecha as fecha, tareas.id as idtarea, tareas.actividad as actividad,tareas.estado as estado, usuarios.nombre as nombre, tareas.asignada as creador  
        from tareas  left join usuarios on usuarios.id = tareas.usuario
        where (tareas.estado = 'Pendiente' or tareas.estado = 'Proceso') and usuarios.usuario = '" . $_SESSION["sUsuario"] . "'";
        $resultado = $conn->query($sql);
        if ($conn->affected_rows >= 1)
            while ($row = $resultado->fetch_assoc()) {
                if ($row['estado'] == 'Pendiente') {
                    $background = 'background-color-rojo';
                } else {
                    $background = 'background-color-amarillo';
                }
                echo "
                <div class='$backgroundClass'>
                    <li><span>Fecha: </span>" . $row['fecha'] . "</li>
                    <li><span>Tarea: </span>" . $row['actividad'] . "</li>
                    <li><span>Creada Por: </span>" . $row['creador'] . "</li>
                    <li><span>Para: </span>" . $row['nombre'] . "</li>
                    <li><span>Nota:<span class='$background'> " . $row['estado'] . "</span> </span><input style='width: 100%;' type='text' id='nota" . $row['idtarea'] . "' value='" . $row['nota'] . "' placeholder='Agregar nota'/></li>
                    <li><button class='btnRealizada' data-idtarea='" . $row['idtarea'] . "'>Realizada</button> <button class='btnProceso' data-idtarea='" . $row['idtarea'] . "'>Proceso</button></li>
                    <br>
                </div>";
            }
        else {
            echo "<script>console.log('No hay Datos');</script>";
        }
        $conn->close();
    }
}
