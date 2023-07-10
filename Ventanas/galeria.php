<?php include("../Template/cabecera.php"); ?>
<?php include("../Template/btnWhat.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="../Style/galeria.css">
</head>
<body>


    <h1>CHARYCRIS</h1>

    <div class="img-gallery">
        <img src="../imgportafolio/cacao.jpeg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/cacaooaramoler.jpg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/cacaoseco.jpg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/compartid.jpeg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/plantas.jpeg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/secado.jpg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/semill.jpg" onclick="openFulImg(this.src)" alt="">
        <img src="../imgportafolio/ima.jpeg" onclick="openFulImg(this.src)" alt="">
    </div>
    <script src="../js/script.js"></script>
</body>
</html>