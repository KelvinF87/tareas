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

    </header>
    <main>
    <div class="modal" id="modalAsignar">
          <div class="modal-content">
            <h2>Asignar tarea</h2>
            <form method="post">
              <label for="tarea">Tarea para</label>
              <select name="listaUsuario" id="listaUsuario">
           
              </select>
            <!--  <button type="submit">Asignar</button> -->
            </form>
          </div>
    </div>
      <form method="post">
        <label for="">Añade la tarea</label>
        <input type="text" id="tareaText" placeholder="Añade tu tarea" />
        <button type="submit" id="btnAddTarea">➕Añadir</button>       
        <button type="submit" name="btnsalir">Salir</button>
    
        
        <div>
          <table id="tareasTabla">
         
            
          </table>
          
          
          
        </div>  
      </form>
    
    </main>
    <script src="js/listarnombre.js"></script>
    <script src="js/addtarea.js"></script>
    <script src="js/listartarea.js"></script>
  </body>
</html>
