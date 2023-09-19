
<?php include("../Template/cabecera.php"); ?>
<?php include("../Template/btnWhat.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Cards - Tarjetas con efecto Hover</title>
	<link rel="stylesheet" href="../Style/style_inicio.css">
</head>
<body>
	<!--   Tarjetas-->
<div class="title-cards">
		<h2>"Cuidamos tu salud"</h2>
	</div>
<div class="container-card">
	
<div class="card">
	<figure>
		<img src="../media/tiendalo.jpeg">
	</figure>
	<div class="contenido-card">
		<h3>Visitar Productos </h3>
		<p>En esta seccion podras visualizar los productos que tenemos para ofrecer y poder comprar para hacer la compra deberas tener tu usuario</p>
		<a href="../Ventanas/productos.php">Productos</a>
	</div>
</div>
<div class="card">
	<figure>
		<img src="../media/iniciar.jpg!d">
	</figure>
	<div class="contenido-card">
		<h3>Iniciar Sesion</h3>
		<p>Inicia sesion con nosotros de esta manera tendras acceso a compras para esto deberas tener tu usuario registrado</p><br>
		<a href="../Ventanas/login.php">Iniciar Sesion</a>
	</div>
</div>
<div class="card">
	<figure>
		<img src="../media/crearte.png">
	</figure>
	<div class="contenido-card">
		<h3>Registrarse</h3>
		<p>Crea tu usario para acceder a todo lo que tenemos para ti para esto solo da click en registrarte</p><br>
		<a href="../Ventanas/registro.php">Registrarse</a>
	</div>
</div>
</div>
<!--Fin   Tarjetas-->
</body>
</html>