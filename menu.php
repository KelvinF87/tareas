<?php
session_start();

if (isset($_POST["btnsalir"])) {
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
      <div class="modal-button" id="modalButton">➕</div>
      <div class="modal" id="modalAsignar">
        <div class="modal-content">
          <h2>Asignar tarea</h2>
          <form method="post">
            <label for="tarea">Tarea para</label>
            <select name="listaUsuario" id="listaUsuario">
            </select>
            <!-- <button type="submit">Asignar</button> -->
          </form>
        </div>
      </div>
      <form method="post">
        <label id="addtarea"  for="">Añade la tarea</label>
        <input type="text" id="tareaText" placeholder="Añade tu tarea" />
        <button type="submit" id="btnAddTarea">➕Añadir</button>
        <button type="submit" name="btnsalir">Salir</button>
        <div>
          <section class="lista-tareas" id="tareasTabla"></section>
        </div>
      </form>
    </main>
    <script src="js/listarnombre.js"></script>
    <script src="js/addtarea.js"></script>
    <script src="js/listartarea.js"></script>
    <script>
      // JavaScript para manejar la animación de la modal
      const modalButton = document.getElementById('modalButton');
      const modal = document.getElementById('modalAsignar');

      modalButton.addEventListener('click', () => {
        modal.classList.toggle('show');
      });

      modal.addEventListener('click', (event) => {
        if (event.target === modal) {
          modal.classList.remove('show');
        }
      });
    </script>
  </body>
</html>
