<?php
include_once('./conexion_bd.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$email = $_POST['email'];
$usuario = '';
$consulta = "SELECT email FROM usuario WHERE email = '$email'";
$consultauser = "SELECT user FROM usuario WHERE email = '$email'";
$resultado = $conexion->query($consulta);
$resultadouser = $conexion->query($consultauser);

if ($resultadouser->num_rows > 0) {
    $row = $resultadouser->fetch_assoc();
    $usuario = $row["user"];

}

function generarCodigoVerificacion()
{
    return mt_rand(100000, 999999);
}


if ($resultado->num_rows > 0) {


    $codigoVerificacion = generarCodigoVerificacion();
    $codigoVerificacionEncriptado = password_hash($codigoVerificacion, PASSWORD_BCRYPT);


    $sql = "UPDATE usuario SET codigo_verificacion = '$codigoVerificacionEncriptado' WHERE email = '$email'";

    if ($conexion->query($sql) === true) {
        $mensaje = "Recuperación de Cuenta CharyCris " . "<br>";
        $mensaje .= "Nombre de Usuario:  " . $usuario . "<br>";
        $mensaje .= "Tu codigo de verificacion es: " . $codigoVerificacion . "<br>";
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fary_alex@outlook.com';
            $mail->Password = '2022Asdaspro';
            $mail->Port = 587;

            $mail->setFrom('fary_alex@outlook.com', 'CharyCris');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Recuperar Contraseña';
            $mail->CharSet = 'UTF-8';
            $mail->Body = $mensaje;
            $mail->send();

        } catch (Exception $e) {
            echo 'Ocurrió un error al enviar el correo: ' . $mail->ErrorInfo;
        }
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Verificación de Código</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10">
                    <form method="post" action="verificar_codigo.php">
                        <label for="codigo">Ingresa el código que recibiste en tu Correo electrónico:</label>
                        <div class="input-group">
                            <input type="text" id="codigo" name="codigo" class="form-control" required pattern="[0-9]+"
                                title="Ingresa solo números">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Verificar</button>
                            <a href="../login.php" class="btn btn-primary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} else {
    echo "<script>alert('El correo ingresado no esta registrado');</script>";
    echo "<script>window.history.back();</script>";
}

$conexion->close();

?>