<?php 
require_once dirname(__FILE__).'/controllers/ControllerLibros.php';
$libroController = new ControllerLibros();
$libros = $libroController->get_libros();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Library</title>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="vistas/nuevoLibro.php">Nuevo Libro</a></li>
			</ul>
		</nav>
	</header>
	<h2>Libros disponibles</h2>
	<form action="controllers/ControllerLibros.php">
		<label for="buscdor">Busca un libro</label>
		<input type="text" name="termino" placeholder="BUSCADOR DE LIBROS">
		<input type="submit" value="Buscar !!" name="btnBuscar"> <br>
	</form>
	<br>
	<table style="border: solid 1px;">
		<thead>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
		</thead>
		<tbody>
			
			<tr>
				<?php foreach ($libros as $col) {?>
					<tr>
						<td><?php echo "$col[codigo]"; ?></td>
						<td><?php echo "$col[nombre]"; ?></td>
						<td><?php echo "$col[descripcion]"; ?></td>
						<td style="border: solid 1px;"><a href="controllers/ControllerLibros.php?edit=<?php echo $col['nombre']?>">Editar<a></td>
						<td style="border: solid 1px;"><a href="controllers/ControllerLibros.php?delete=<?php echo $col['codigo']?>">Eliminar</a></td>
					</tr>
				<?php } ?>
			</tr>
		</tbody>
	</table>
</body>
</html>