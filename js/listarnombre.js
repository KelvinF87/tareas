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
  