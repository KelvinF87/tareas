const listarTareas = async () => {
  const tareasTabla = document.getElementById("tareasTabla");
      const formData = new FormData();
      formData.append("listarTarea", "tarea");
      /*formData.append("usuario", usuario);
      formData.append("login", "login");*/
  
      fetch("./controller/listartarea.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          console.log(data);
          tareasTabla.innerHTML = data;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
  
  };
  listarTareas();
  