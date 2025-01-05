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
     // console.log(data);
      tareasTabla.innerHTML = data;
      const btnRealizada = document.querySelectorAll(".btnRealizada");
     
      btnRealizada.forEach((btn) => {
        btn.addEventListener("click", (e) => { 
          e.preventDefault();
          let idtarea = btn.getAttribute("data-idtarea");
         // alert(idtarea);
          const tareaNota = document.getElementById("nota"+idtarea);
         console.log(tareaNota.value);
        actualizaTarea(idtarea, "Realizado" , tareaNota.value); 
        });
      });
      const btnProceso = document.querySelectorAll(".btnProceso");
      btnProceso.forEach((btn) => {
        btn.addEventListener("click", (e) => { 
          e.preventDefault();
          let idtarea = btn.getAttribute("data-idtarea");
          // alert(idtarea);
           const tareaNota = document.getElementById("nota"+idtarea);
          console.log(tareaNota.value);
         actualizaTarea(idtarea, "Proceso" , tareaNota.value); 
        });
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};
listarTareas();

const btnRealizada = document.querySelectorAll(".btnRealizada");

btnRealizada.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    alert("hola");
  });
});

function actualizaTarea(id, estado , nota) {
  if(nota == ""){
    alert("Debe ingresar una nota");
    return;
  }else{
    
  const formData = new FormData();
  formData.append("idtarea", id);
  formData.append("estado", estado);
  formData.append("nota", nota);
  fetch("./controller/actualizartarea.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      listarTareas();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  console.log(id, estado, nota);
  }
}