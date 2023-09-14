document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("login-form");

  loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;

    // Realiza la validación de los campos, similar a como lo hiciste en el registro

    // Si las validaciones pasan, puedes enviar el formulario aquí
    fetch('Configuraciones/autenticar.php', {
      method: 'POST',
      body: new FormData(loginForm), // Envía los datos del formulario
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          Swal.fire({
            title: 'Éxito',
            text: 'Inicio de sesión exitoso',
            icon: 'success',
            confirmButtonText: 'Cerrar',
            allowOutsideClick: false, // Evita que se cierre haciendo clic afuera
          }).then((result) => {
            if (result.isConfirmed) {
              // Redirecciona o realiza alguna acción después de iniciar sesión
              // Puedes utilizar window.location.href para redireccionar
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