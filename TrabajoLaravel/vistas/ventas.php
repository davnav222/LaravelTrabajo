<?php


try {
    $stmt = $pdo->query("SELECT id, descripcion, stock FROM productos WHERE stock > 0");
    $productos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>

<h2>Registrar Venta de Artículo</h2>

<form action="procesar_venta.php" method="POST" class="formulario">
    <label for="id_producto">Producto a vender:</label>
    <select name="id_producto" id="id_producto" required>
        <option value="">-- Seleccione un producto --</option>
        <?php foreach ($productos as $row): ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['descripcion']; ?> (Stock: <?php echo $row['stock']; ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" min="1" required>

    <button type="submit" class="btn-guardar">Confirmar Venta</button>
</form>