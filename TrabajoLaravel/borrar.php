<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    try {

        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        

        header("Location: index.php?page=gestion");
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar: " . $e->getMessage();
    }
} else {
    echo "No se recibió ningún ID para borrar.";
}
?>