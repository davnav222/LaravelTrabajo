<?php

try {
    $sql = "SELECT v.id_venta, p.descripcion, v.cantidad, v.fecha_venta 
            FROM ventas v
            JOIN productos p ON v.id_producto = p.id
            ORDER BY v.fecha_venta DESC";
            
    $stmt = $pdo->query($sql);
    $ventas = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error en el reporte: " . $e->getMessage();
}
?>

<h2>Historial de Ventas Realizadas</h2>

<?php if (count($ventas) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?php echo $venta['id_venta']; ?></td>
                    <td><?php echo $venta['descripcion']; ?></td>
                    <td><?php echo $venta['cantidad']; ?> unidades</td>
                    <td><?php echo date("d/m/Y H:i", strtotime($venta['fecha_venta'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aún no se han realizado ventas.</p>
<?php endif; ?>

<div style="margin-top: 20px;">
    <a href="index.php?page=ventas"><button style="background-color: steelblue; width: auto;">Nueva Venta</button></a>
</div>