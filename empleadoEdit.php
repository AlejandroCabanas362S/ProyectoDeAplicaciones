<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    $fecha = $_POST['fecha_ingreso'];
    $sueldo = $_POST['sueldo'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];

    $stmt = $conn->prepare("UPDATE empleados SET nombre=?, apellido=?, cargo=?, fecha_ingreso=?, sueldo=?, numero=?, correo=? WHERE id=?");
    $stmt->bind_param("ssssdssi", $nombre, $apellido, $cargo, $fecha, $sueldo, $numero, $correo, $id);

    if ($stmt->execute()) {
        header("Location: empleados.php");
        exit();
    } else {
        echo "Error al editar: " . $stmt->error;
    }
}
?>
