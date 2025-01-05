const btnAddTarea = document.getElementById("btnAddTarea");
btnAddTarea.addEventListener("click", function (event) {
  event.preventDefault();
  // alert('hola');
  registraTarea();
});

const registraTarea = async () => {
  const tareaText = document.getElementById("tareaText").value;
  const listaUsuario = document.getElementById("listaUsuario").value;


    const formData = new FormData();
    formData.append("actividad", tareaText);
    formData.append("idusuario", listaUsuario);
    formData.append("addtarea", "add");

    fetch("./controller/addtarea.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        const tareaText = document.getElementById("tareaText");
        console.log(data);
        tareaText.value = "";
        tareaText.focus();
        listarTareas();
        if (data == "err1") {
          alert("La actividad debe tener al menos 5 caracteres.");
        
        }
     
      })
      .catch((error) => {
        console.error("Error:", error);
      });

};
