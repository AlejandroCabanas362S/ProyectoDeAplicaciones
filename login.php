<?php
session_start();
include 'conexion.php';

$nombreUsuario = $_POST['txtusuario'];
$pass = $_POST['txtpassword'];

// Validación con la base de datos
$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario ='$nombreUsuario' AND contrasena ='$pass'");
$nr = mysqli_num_rows($query);

if ($nr == 1) {
    $userData = mysqli_fetch_assoc($query);

    $_SESSION['usuario'] = $userData['usuario'];   // Ej: acabanas
    $_SESSION['nombre'] = $userData['nombre'];     // Ej: Alejandro
    $_SESSION['apellido'] = $userData['apellido'];     // Ej: Alejandro
    $_SESSION['correo'] = $userData['correo'];     // Ej: Alejandro
    $_SESSION['rol'] = $userData['rol'];           // Ej: admin

    header("Location: index.php");
    exit;
} else {
    $_SESSION['mensaje_error'] = 'Usuario o contraseña incorrecta';
    header("Location: login_styled.php");
    exit;
}

?>
