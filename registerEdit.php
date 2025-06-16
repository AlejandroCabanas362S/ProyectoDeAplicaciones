<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];

    $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, apellido=?, correo=?, rol=? WHERE id=?");
    $stmt->bind_param("ssssi", $nombre, $apellido, $correo, $rol, $id);

    if ($stmt->execute()) {
        header("Location: register.php?edit=success");
        exit();
    } else {
        echo "Error al editar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
