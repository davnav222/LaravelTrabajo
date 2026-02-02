<?php
require_once 'db.php';
$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();


$categorias = $pdo->query("SELECT * FROM categorias")->fetchAll();
?>

<h3>Editar Producto</h3>
<form action="procesar_editar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $p['id']; ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre_producto" value="<?php echo $p['nombre_producto']; ?>"><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion"><?php echo $p['descripcion']; ?></textarea><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="<?php echo $p['stock']; ?>"><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="<?php echo $p['precio']; ?>"><br><br>

    <label>Categoría:</label><br>
    <select name="id_categoria">
        <?php foreach ($categorias as $cat): ?>
            <option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $p['id_categoria']) ? 'selected' : ''; ?>>
                <?php echo $cat['nombre_categoria']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Actualizar Cambios</button>
</form>