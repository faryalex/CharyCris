<?php include("./Template/cabecera.php"); ?>
<?php include("./Template/btnWhat.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="Style/Stylenosotros.css">

</head>
<section class="about-us-area mt-50 section-padding-100">
    <div class="contNosotros">
        <div class="row">
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                <h3>Misión</h3>
                <p>"Nuestra misión es deleitar a nuestros clientes con chocolates de la más alta
                    calidad, elaborados exclusivamente a partir de cacao natural e ingredientes puros. Nos comprometemos
                    a ofrecer un producto que respete la salud y el bienestar de nuestros consumidores, promoviendo al
                    mismo tiempo prácticas sostenibles en la cadena de suministro del cacao. Trabajamos incansablemente
                    para mantener la frescura y autenticidad de nuestros chocolates, y buscamos inspirar momentos de
                    felicidad y indulgencia en cada bocado.</p>
            </div>
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                <h3>Visión</h3>
                <p>"Nuestra visión es convertirnos en líderes reconocidos en la industria del chocolate a base de cacao
                    natural, estableciendo un estándar de excelencia en calidad, sabor y sostenibilidad. Queremos compartir la riqueza y la
                    autenticidad de nuestros productos con consumidores de todas las culturas. Nos esforzamos por ser
                    una empresa que marque la diferencia, promoviendo prácticas responsables y éticas en toda nuestra
                    cadena de suministro.</p>
            </div>
        </div>
    </div>
</section>
<div class="owl-carousel">
    <div class="item"><img src="ImgCharyCris/cacao3.jpg" alt="" class=""></div>
    <div class="item"><img src="ImgCharyCris/cacao4.jpg" alt="" class=""></div>
    <div class="item"><img src="ImgCharyCris/cacao5.jpg" alt="" class=""></div>
</div>
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
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Fundador</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Director</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
                    <div class="teachers-info mt-30">
                        <h5>Marcelino</h5>
                        <span>Secretario</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="700ms">
                    <div class="teachers-thumbnail">
                        <img src="ImgCharyCris/marcelino.jpeg" alt="">
                    </div>
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
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</html>