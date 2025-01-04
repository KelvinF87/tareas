<?php
include_once("../config/db.php");
session_start();
if (isset($_POST["listarTarea"])) {
    if ($_SESSION["sTipo"] == "Padre" || $_SESSION["sTipo"] == "Madre") {

        $sql = "select tareas.fecha as fecha, tareas.id as idtarea, tareas.actividad as actividad,tareas.estado as estado, usuarios.nombre as nombre, tareas.asignada as creador  
        from tareas  left join usuarios on usuarios.id = tareas.usuario
        where tareas.estado = 'Pendiente' or tareas.estado = 'Proceso' ";
   $resultado = $conn->query($sql);
    if ($conn->affected_rows >= 1) {
        echo " <thead>
        <tr>
        <th>Fecha</th>
          <th>Actividad</th>
           <th>Asignada Por</th>
           <th>Asignada A</th>
          <th>Acción</th>
        </tr>
      </thead>  
      <tbody>";
        while ($row = $resultado->fetch_assoc()) {
            echo "          
              <tr>
               <td>".$row['fecha']."</td>
                <td>".$row['actividad']."</td>
                <td>".$row['creador']."</td>
                  <td>".$row['nombre']."</td>
                <td> <button>Realizada</button> <button>Proceso</button></td>
              </tr>
            ";
        }
        echo "</tbody>";
    } else {
        echo "<script>console.log('No hay Datos');</script>";
    }
    $conn->close();
  
    } else {
        $sql = "select tareas.fecha as fecha, tareas.id as idtarea, tareas.actividad as actividad,tareas.estado as estado, usuarios.nombre as nombre, tareas.asignada as creador  
        from tareas  left join usuarios on usuarios.id = tareas.usuario
        where (tareas.estado = 'Pendiente' or tareas.estado = 'Proceso') and usuarios.usuario = '" . $_SESSION["sUsuario"] . "'";
        $resultado = $conn->query($sql);
        if ($conn->affected_rows >= 1) {
            echo " <thead>
            <tr>
            <th>Fecha</th>
              <th>Actividad</th>
               <th>Asignada Por</th>
              <th>Acción</th>
            </tr>
          </thead>  
          <tbody>";
            while ($row = $resultado->fetch_assoc()) {
                echo "          
                  <tr>
                   <td>".$row['fecha']."</td>
                    <td>".$row['actividad']."</td>
                    <td>".$row['creador']."</td>
                    <td> <button>Realizada</button> <button>Proceso</button></td>
                  </tr>
                ";
            }
            echo "</tbody>";
        } else {
            echo "<script>console.log('No hay Datos');</script>";
        }
        $conn->close();
    }
   
}
