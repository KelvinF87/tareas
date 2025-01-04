// Función para actualizar el texto del botón
function updateButtonText() {
  const addtarea = document.getElementById("addtarea");
  const listaUsuario = document.getElementById("listaUsuario");
  let nomnredata = listaUsuario.options[listaUsuario.selectedIndex]; // Obtener la opción seleccionada
  let dataId = nomnredata.getAttribute("data-id"); // Obtener el valor del atributo data-id
  addtarea.innerText = "Agregar tarea a: " + dataId;
}

// Llamar a la función después de 200  milisegundo
setTimeout(updateButtonText, 200);

// Llamar a la función cuando cambie la opción seleccionada
document
  .getElementById("listaUsuario")
  .addEventListener("change", updateButtonText);

const loginUsuario = async () => {
  const listaUsuario = document.getElementById("listaUsuario");
  const formData = new FormData();
  formData.append("listarNombre", "nombre");
  /*formData.append("usuario", usuario);
      formData.append("login", "login");*/

  fetch("./controller/listarnombre.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      listaUsuario.innerHTML = data;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};
loginUsuario();
