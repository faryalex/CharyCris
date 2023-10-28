document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("login-form");

  loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;
    fetch('Configuraciones/autenticar.php', {
      method: 'POST',
      body: new FormData(loginForm),
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          Swal.fire({
            title: 'Éxito',
            text: 'Inicio de sesión exitoso',
            icon: 'success',
            confirmButtonText: 'Cerrar',
            allowOutsideClick: false,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'productos.php';
            }
          });
        } else {
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