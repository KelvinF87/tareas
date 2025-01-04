const btnlogin = document.getElementById("btnlogin");
btnlogin.addEventListener("click", function (event) {
  event.preventDefault();
  //  alert('hola');
  loginUsuario();
});

const loginUsuario = async () => {
  const pass = document.getElementById("pass").value;
  const usuario = document.getElementById("usuario").value;

    const formData = new FormData();
    formData.append("pass", pass);
    formData.append("usuario", usuario);
    formData.append("login", "login");

    fetch("./controller/valida.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        if (data == "ok") {
          window.location.href = "menu.php";
        } else {
        alert(data);
      }
      })
      .catch((error) => {
        console.error("Error:", error);
      });

};

