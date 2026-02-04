<?php
include('db.php'); // Aquí se crea $pdo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = $_POST['id_producto'];
    $cantidad_vendida = $_POST['cantidad'];

    try {

        $stmt = $pdo->prepare("SELECT stock FROM productos WHERE id = ?");
        $stmt->execute([$id_producto]);
        $producto = $stmt->fetch();

        if ($producto && $producto['stock'] >= $cantidad_vendida) {
            // Iniciamos una transacción para que se hagan las dos cosas o ninguna
            $pdo->beginTransaction();


            $sql_update = "UPDATE productos SET stock = stock - ? WHERE id = ?";
            $pdo->prepare($sql_update)->execute([$cantidad_vendida, $id_producto]);


            $sql_insert = "INSERT INTO ventas (id_producto, cantidad) VALUES (?, ?)";
            $pdo->prepare($sql_insert)->execute([$id_producto, $cantidad_vendida]);

            $pdo->commit();
            
            header("Location: index.php?page=listado&msg=venta_ok");
        } else {
            echo "<script>alert('Error: Stock insuficiente'); window.history.back();</script>";
        }
    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo "Error en la transacción: " . $e->getMessage();
    }
}