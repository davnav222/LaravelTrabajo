<?php

try {
    $sql = "SELECT c.id_compra, p.descripcion, c.cantidad, c.proveedor
            FROM compras c
            JOIN productos p ON c.id_producto = p.id";
            
    $stmt = $pdo->query($sql);
    $compras = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error en el reporte: " . $e->getMessage();
}
?>

<h2>Historial de Compras Realizadas</h2>

<?php if (count($compras) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>proveedor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?php echo $compra['id_compra']; ?></td>
                    <td><?php echo $compra['descripcion']; ?></td>
                    <td><?php echo $compra['cantidad']; ?> unidades</td>
                    <td><?php echo $compra['proveedor']; ?> proveedor</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aún no se han realizado compras.</p>
<?php endif; ?>

<div style="margin-top: 20px;">
    <a href="index.php?page=compra"><button style="background-color: steelblue; width: auto;">Nueva Compra</button></a>
</div>
