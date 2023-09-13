<?php include("./Template/cabecera.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- Title -->
    <title>Sobre Nosotros</title>
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="Style/Stylenosotros.css">

</head>
<!-- ... Tu código HTML anterior ... -->

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area mt-50 section-padding-100">
    <div class="contNosotros">
        <div class="row">
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                <h3>Misión</h3>
                <p>"Nuestra misión es deleitar a nuestros clientes en todo el mundo con chocolates de la más alta calidad, elaborados exclusivamente a partir de cacao natural y ingredientes puros. Nos comprometemos a ofrecer un producto que respete la salud y el bienestar de nuestros consumidores, promoviendo al mismo tiempo prácticas sostenibles en la cadena de suministro del cacao. Trabajamos incansablemente para mantener la frescura y autenticidad de nuestros chocolates, y buscamos inspirar momentos de felicidad y indulgencia en cada bocado.</p>
            </div>
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                <h3>Visión</h3>
                <p>"Nuestra visión es convertirnos en líderes reconocidos en la industria del chocolate a base de cacao natural, estableciendo un estándar de excelencia en calidad, sabor y sostenibilidad. Buscamos expandir nuestra presencia a nivel nacional e internacional, compartiendo la riqueza y la autenticidad de nuestros productos con consumidores de todas las culturas. Nos esforzamos por ser una empresa que marque la diferencia, promoviendo prácticas responsables y éticas en toda nuestra cadena de suministro, contribuyendo así a un mundo más saludable y sostenible.</p>
            </div>
        </div>
    </div>
</section>
<div class="owl-carousel">
            <div class="item"><img src="ImgCharyCris/cacao3.jpg" alt="" class="carousel-image"></div>
            <div class="item"><img src="ImgCharyCris/cacao4.jpg" alt="" class="carousel-image"></div>
            <div class="item"><img src="ImgCharyCris/cacao5.jpg" alt="" class="carousel-image"></div>
        </div>

<!-- ##### About Us Area End ##### -->

<!-- ... El resto de tu código HTML ... -->

<!-- ##### About Us Area End ##### -->

<!-- ##### Team Area Start ##### -->
<section class="teachers-area section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <h3>Quienes Conformamos CharyCris <br><br></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Teachers -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                    <!-- Thumbnail -->
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <!-- Meta Info -->
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Fundador</span>
                    </div>
                </div>
            </div>
            <!-- Single Teachers -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <!-- Thumbnail -->
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <!-- Meta Info -->
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Director</span>
                    </div>
                </div>
            </div>
            <!-- Single Teachers -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                    <!-- Thumbnail -->
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <!-- Meta Info -->
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Secretario</span>
                    </div>
                </div>
            </div>
            <!-- Single Teachers -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="700ms">
                    <!-- Thumbnail -->
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <!-- Meta Info -->
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Sucesor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items: 1, // Número de elementos visibles a la vez
            loop: true, // Repetir el carrusel
            autoplay: true, // Reproducción automática
            autoplayTimeout: 3000, // Tiempo entre diapositivas (en milisegundos)
            autoplayHoverPause: true, // Pausar en el paso del mouse
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


</html>