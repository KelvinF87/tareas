<?php 
include_once("../config/db.php");

if (isset($_POST["listarNombre"])) {
  $sql = "select id, nombre from usuarios ";
  $resultado = $conexion->query($sql);
  if ($conexion->affected_rows >= 1) {
  while ($row = $resultado->fetch_assoc()) {
    echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
  }
  } else {
    echo "<script>console.log('No hay nombre o hay un error');</script>";
  }
}
 ?>