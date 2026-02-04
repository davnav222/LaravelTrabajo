<?php
require_once 'db.php';


$stmtCat = $pdo->query("SELECT * FROM categorias");
$categorias = $stmtCat->fetchAll();


$id_seleccionado = $_GET['id_categoria'] ?? ''; 

$productos = [];

if ($id_seleccionado != '') {

    $sql = "SELECT p.*, c.nombre_categoria 
            FROM productos p 
            INNER JOIN categorias c ON p.id_categoria = c.id 
            WHERE p.id_categoria = ?";
    
    $stmtProd = $pdo->prepare($sql);
    $stmtProd->execute([$id_seleccionado]);
    $productos = $stmtProd->fetchAll();
}
?>

<h3>Listado Filtrado de Artículos</h3>

<form method="GET" action="index.php">
    <input type="hidden" name="page" value="filtrado">

    <label>Elige una categoría:</label>
    <select name="id_categoria" onchange="this.form.submit()">
        <option value="">-- Todas las categorías --</option>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?php echo $cat['id']; ?>" <?php echo ($id_seleccionado == $cat['id']) ? 'selected' : ''; ?>>
                <?php echo $cat['nombre_categoria']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<hr>

<?php if ($id_seleccionado != ''): ?>
    <?php if (count($productos) > 0): ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Categoría</th>
            </tr>
            <?php foreach ($productos as $p): ?>
            <tr>
                <td><?php echo $p['nombre_producto']; ?></td>
                <td><?php echo $p['stock']; ?></td>
                <td><?php echo $p['precio']; ?> €</td>
                <td><?php echo $p['nombre_categoria']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No hay productos en esta categoría.</p>
    <?php endif; ?>
<?php else: ?>
    <p>Selecciona una categoría para ver los resultados.</p>
<?php endif; ?>