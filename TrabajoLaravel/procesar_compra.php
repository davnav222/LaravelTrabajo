<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = $_POST['id_producto'];
    $cantidad_compra = $_POST['cantidad'];
    $proveedor_compra = $_POST['proveedor'];
    try {

        $stmt = $pdo->prepare("SELECT stock FROM productos WHERE id = ?");
        $stmt->execute([$id_producto]);
        $producto = $stmt->fetch();

        if ($producto && $producto['stock'] = $cantidad_compra) {

            $pdo->beginTransaction();


            $sql_update = "UPDATE productos SET stock = stock + ? WHERE id = ?";
            $pdo->prepare($sql_update)->execute([$cantidad_compra, $id_producto]);


            $sql_insert = "INSERT INTO compras (id_producto, cantidad, proveedor) VALUES (?, ?, ?)";
            $pdo->prepare($sql_insert)->execute([$id_producto, $cantidad_compra, $proveedor_compra]);
            


            $pdo->commit();
            
            header("Location: index.php?page=listado&msg=compra_ok");
        } else {
         echo "<script>alert('Error'); window.history.back();</script>";
        }
         
    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo "Error en la transacción: " . $e->getMessage();
    }
}
