<?php
require_once 'db.php';
$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll();
?>
<h3>Gestión de Artículos (Modificar/Borrar)</h3>
<table border="1" cellpadding="10">
    <tr>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $p): ?>
    <tr>
        <td><?php echo $p['nombre_producto']; ?></td>
        <td>
		<a href="index.php?page=editar&id=<?php echo $p['id']; ?>"><button>Editar</button></a>
            
		<a href="borrar.php?id=<?php echo $p['id']; ?>" onclick="return confirm('¿Estás seguro?')">
  		  <button style="color:red;">Borrar</button>
		</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>