<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nuestros Desarrolladores</title>´

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/desarrolladores.css">
</head>

<body>
    <a href="#" id="btn-regresar" class="btn-flotante">
        <span>
            <i class="fas fa-arrow-left"></i>
            Regresar
        </span>
    </a>
    <div class="row no-gutters">
        <div class="col no-gutters">
            <div class="leftside">

                <section id="inicio" class="inicio">
                    <div class="contenido-banner">
                        <div class="contenedor-img">
                            <img src="../media/pro6.jpeg" alt="">
                        </div>
                        <h1>FERNANDO CASTRO</h1>
                        <h2>Tecnologo de Software - 19 años</h2>
                        <div class="redes">
                            <a href="https://www.facebook.com/marcelo.castro.524934" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/marcelo_castro.12/" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                            <a href="https://wa.me/0984888280" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="https://discord.gg/agncREpR" target="_blank"><i
                                    class="fa-brands fa-discord"></i></i></a>
                            <a href="https://www.tiktok.com/@marcelocastro45" target="_blank"><i
                                    class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <div class="col no-gutters">
            <div class="rightside">
                <section id="inicio" class="inicio">
                    <div class="contenido-banner">
                        <div class="contenedor-img">
                            <img src="../media/mauro.jpg" alt="">
                        </div>
                        <h1>MAURO FARINANGO</h1>
                        <h2>Tecnologo de Software - 26 años</h2>
                        <div class="redes">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href=""><i class="fa-brands fa-discord"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://wa.me/0998734675"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("btn-regresar").addEventListener("click", function (event) {
            event.preventDefault();
            window.location.href = "../contactanos.php";
        });
    </script>
</body>