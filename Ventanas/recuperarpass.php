<!DOCTYPE html>
<html>
<head>
    <title>Recuperar/ Cambiar Contraseña</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="../Style/login.css" />
    </head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10">
                <h1 class="text-center">Recuperar/ Cambiar Contraseña</h1>
                <form method="post" action="../Configuraciones/envia_codigo.php">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button> 
                        <a href="../login.php" class="btn btn-primary">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
