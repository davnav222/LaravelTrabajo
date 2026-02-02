<?php
require_once 'db.php';


$sql = "SELECT p.*, c.nombre_categoria 
        FROM productos p 
        INNER JOIN categorias c ON p.id_categoria = c.id";

$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll();
?>

<h3>Listado General de Artículos</h3>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['nombre_producto']; ?></td>
            <td><?php echo $p['nombre_categoria']; ?></td>
            <td><?php echo $p['stock']; ?></td>
            <td><?php echo $p['precio']; ?> €</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
