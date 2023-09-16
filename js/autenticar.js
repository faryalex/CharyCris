
document.addEventListener("DOMContentLoaded", function () {
  const formulario = document.querySelector("form");

  formulario.addEventListener("submit", function (event) {
    event.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const user = document.getElementById("user").value;
    const password = document.getElementById("password").value;
    const correo = document.getElementById("correo").value;
    const telefono = document.getElementById("telefono").value;

    if (
      !nombre ||
      !apellido ||
      !user ||
      !password ||
      !correo ||
      !telefono
    ) {
      Swal.fire({
        title: "Error",
        text: "Complete todos los campos",
        icon: "error",
        confirmButtonText: "Cerrar",
      });
      return;
    }

    if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,4}$/.test(correo)) {
      Swal.fire({
        title: "Error",
        text: "Correo electrónico no es válido",
        icon: "error",
        confirmButtonText: "Cerrar",
      });
      return;
    }
    if (!/^[0-9]{10}$/.test(telefono)) {
      Swal.fire({
        title: "Error",
        text: "El número de teléfono no es válido",
        icon: "error",
        confirmButtonText: "Cerrar",
      });
      return;
    }
    // Si todas las validaciones pasan, puedes enviar el formulario aquí
    fetch('./Configuraciones/autenticarregistro.php', {
      method: 'POST',
      body: new FormData(formulario), // Envía los datos del formulario
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          Swal.fire({
            title: 'Éxito',
            text: 'Registro exitoso',
            icon: 'success',
            confirmButtonText: 'Cerrar',
            allowOutsideClick: false, // Evita que se cierre haciendo clic afuera
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = './login.php'; // Redirecciona después de hacer clic en "Cerrar"
            }
          });

        } else  {
          Swal.fire({
            title: 'Error',
            text: data.error,
            icon: 'error',
            confirmButtonText: 'Cerrar',
          });
        }
      })
      .catch(error => {
        console.error('Error al enviar los datos:', error);
      });


  });
});
