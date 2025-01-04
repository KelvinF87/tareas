const btnregistrousuario = document.getElementById("btnregistrousuario");
btnregistrousuario.addEventListener("click", function (event) {
  event.preventDefault();
  // alert('hola');
  registraUsuario();
});

const registraUsuario = async () => {
  const nombre = document.getElementById("nombre").value;
  const pass = document.getElementById("pass").value;
  const repitepass = document.getElementById("repitepass").value;
  const usuario = document.getElementById("usuario").value;
  const tipo = document.getElementById("tipo").value;
  if (pass === repitepass) {
    const formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("pass", pass);
    formData.append("usuario", usuario);
    formData.append("tipo", tipo);
    formData.append("accion", "registrousuario");

    fetch("./controller/registro.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        alert(data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } else {
    alert("Las contraseñas no coinciden");
  }
};
