<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare("UPDATE productos SET nombre=?, precio=?, cantidad=? WHERE id=?");
    $stmt->bind_param("sdii", $nombre, $precio, $cantidad, $id);

    if ($stmt->execute()) {
        header("Location: products.php");
        exit();
    } else {
        echo "❌ Error al editar: " . $stmt->error;
    }
}
?>
