function validarSesion() {
  fetch("controller/session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded", // Usamos este tipo de contenido ya que no es JSON
    },
    body: "checkSession=true", // Podrías enviar algún dato para procesar en el servidor si es necesario
  })
    .then((response) => response.text()) // Esperamos la respuesta en texto (script con la redirección)
    .then((data) => {
      // Aquí podemos ejecutar directamente lo que el servidor ha enviado (un script con redirección)
      // document.body.innerHTML = data;  // Colocamos el contenido del script en el body para que ejecute la redirección

      if (data == "salir") {
        // Si la respuesta es 'no', redirigimos al usuario a la página de login
        // window.location.href = "index.html";
        console.log("dijo no. " + data)
        window.location.href = 'index.html';

      }else if(data == "entrar"){
        console.log("dijo si. "+data)
       window.location.href = 'menu.php';
      }
    })
    .catch((error) => {
      console.error("Hubo un problema con la petición Fetch:", error);
    });
}

// Llamar a la función para validar la sesión
validarSesion();
