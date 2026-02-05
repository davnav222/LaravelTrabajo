<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Informática</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <header>
        <h1>Tienda de Informática</h1>
        <nav>
            <a href="index.php?page=inicio"><button>Inicio</button></a>
            <a href="index.php?page=entrada"><button>Entrada de Datos</button></a>
            <a href="index.php?page=listado"><button>Listado General</button></a>
            <a href="index.php?page=filtrado"><button>Filtrado</button></a>
            <a href="index.php?page=gestion"><button>Modificar/Borrar</button></a>
	    <a href="index.php?page=ventas"><button>Vender Artículo</button></a>
	    <a href="index.php?page=reporte"><button>Historial Ventas</button></a>
        </nav>
    </header>

    <main>
        <?php
		include "db.php";
          		$page = $_GET['page'] ?? 'inicio';
           		include "vistas/$page.php";
        ?>
    </main>

    <footer>

    </footer>
</body>
</html>