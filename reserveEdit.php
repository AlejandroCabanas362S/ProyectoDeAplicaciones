<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];
    $servicio = $_POST['servicioDeseado'];
    $notas = $_POST['notas'];

    $stmt = $conn->prepare("UPDATE reservas SET nombre=?, apellido=?, fecha=?, correo=?, servicioDeseado=?, notas=? WHERE id=?");
    $stmt->bind_param("ssssssi", $nombre, $apellido, $fecha, $correo, $servicio, $notas, $id);

    if ($stmt->execute()) {
        header("Location: reserve.php");
        exit();
    } else {
        echo "❌ Error al editar: " . $stmt->error;
    }
}
?>
