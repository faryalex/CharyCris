const botonRegistrar = document.getElementById("boton-registrar");
botonRegistrar.disabled = true;

document.addEventListener("input", () => {
  const user = document.getElementById("user").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const correo = document.getElementById("correo").value;
  const password = document.getElementById("password").value;
  const telefono = document.getElementById("telefono").value;
  
  if (user && nombre && apellido && correo && password && telefono) {
    botonRegistrar.disabled = false;
  } else {
    
    botonRegistrar.disabled = true;
  }
});
