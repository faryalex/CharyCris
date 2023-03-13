import {mens} from "./puente.js";


  $("#enviar").click(function() {
      $.ajax({
          url: "./Ventanas/enviar.php", // URL del archivo PHP que procesa la solicitud
          type: "POST", // Tipo de solicitud
          data: { variable: mens}, // Variable que se envía al servidor
          success: function(respuesta) {
              // Código que se ejecuta si la solicitud se realiza correctamente
              $("#respuesta").html(respuesta);
          },
          error: function(xhr, status, error) {
              // Código que se ejecuta si hay un error al realizar la solicitud
              console.log("Error: " + error);
          }
      });
  });
