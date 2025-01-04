<?php
session_start();
// echo isset($_SESSION["sNombre"]) && isset($_SESSION["sTipo"]) ? "El nombre y tipo están configurados." : "No se encontraron los valores de sNombre o sTipo.";

if (isset($_POST["btnsalir"])) {
    // var_dump($_POST["btnsalir"]);
    session_destroy();
    echo "<script>window.location.href = 'index.html';</script>";
}
if (!isset($_SESSION["sNombre"]) && !isset($_SESSION["sTipo"])) {
   echo "<script>window.location.href = 'index.html';</script>";
  
} 
  ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tareas</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <header>
      <h1>Tareas Día a Día</h1>
      <form method="post" action="">
        <input type="submit" name="btnsalir" value="Salir"/>
      </form>
    </header>
    <main>
    <div class="modal" id="modalAsignar">
          <div class="modal-content">
            <h2>Asignar tarea</h2>
            <form method="post">
              <label for="tarea">Tarea para</label>
              <select name="listaUsuario" id="listaUsuario">
           
              </select>
              <button type="submit">Asignar</button>
            </form>
          </div>
    </div>
      <form method="post">
        <label for="">Añade la tarea</label>
        <input type="text" name="tarea" placeholder="Añade tu tarea" />
        <button type="submit">➕Añadir</button>
        
        <div>
          <table>
            <thead>
              <tr>
                <th>Actividad</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Correr 10 minutos</td>
                <td> <button>Realizada</button> <button>Proceso</button></td>
              </tr>
            </tbody>
          </table>
          
          
          
        </div>
      </form>
    </main>
    <script src="js/listarnombre.js"></script>
  </body>
</html>
