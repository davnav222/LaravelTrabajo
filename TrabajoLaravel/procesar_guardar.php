<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = $_POST['nombre_producto'];
	$desc = $_POST['descripcion'];
	$stock = $_POST['stock'];
	$precio = $_POST['precio'];
	$cat = $_POST['id_categoria'];

	$sql = "INSERT INTO productos (nombre_producto, descripcion, stock, precio, id_categoria) VALUES (?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$nombre, $desc, $stock, $precio, $cat]);

    header("Location: index.php?page=listado"); // Nos manda al listado tras guardar
}
?>