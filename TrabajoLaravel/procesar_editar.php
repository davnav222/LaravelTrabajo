<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sql = "UPDATE productos SET nombre_producto=?, descripcion=?, stock=?, precio=?, id_categoria=? WHERE id=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
   	 $_POST['nombre_producto'], 
   	 $_POST['descripcion'], 
   	 $_POST['stock'], 
  	 $_POST['precio'], 
  	 $_POST['id_categoria'], 
  	 $_POST['id']
	]);
}

header("Location: index.php?page=listado");
?>