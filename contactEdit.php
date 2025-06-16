<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $stmt = $conn->prepare("UPDATE contacto SET nombre=?, apellido=?, correo=?, asunto=?, mensaje=? WHERE id=?");
    $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $asunto, $mensaje, $id);

    if ($stmt->execute()) {
        header("Location: contact.php?edit=ok");
        exit();
    } else {
        echo "❌ Error al editar: " . $stmt->error;
    }
}
?>
