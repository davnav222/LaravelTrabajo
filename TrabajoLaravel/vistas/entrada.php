<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM categorias");
$categorias = $stmt->fetchAll();
?>

<h3>Registrar Nuevo Producto</h3>
<form action="procesar_guardar.php" method="POST">

    <label>Nombre del Producto:</label><br>
    <input type="text" name="nombre_producto" required><br><br>

    <label>Descripción:</label><br>
    <input type="text" name="descripcion" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Categoría:</label><br>
    <select name="id_categoria">
	<?php foreach ($categorias as $cat): ?>
   	 <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre_categoria']; ?></option>
	<?php endforeach; ?>
    </select><br><br>

    <button type="submit">Guardar Producto</button>
</form>