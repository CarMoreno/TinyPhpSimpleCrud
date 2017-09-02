<?php
	$minombre = $_GET['nombre'];
	$midescripcion = $_GET['descripcion'];
	$micodigo = $_GET['codigo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- -->
	<form action="../controllers/ControllerLibros.php" method="POST">
		<input type="hidden" value="<?php echo $micodigo ?>" name="micodigo">
		<label for="nombre"></label>
		<input id="nombre" name="nuevoNombre" type="text" value="<?php echo $minombre;?>"><br>
		<input type="hidden" value="">
		<label for="descripcion"></label>
		<textarea name="nuevaDescripcion" id="descripcion" cols="30" rows="10">
			<?php echo $midescripcion;?>
		</textarea><br>
		<input type="submit" name="btnEditar" value=">> Editar libro">

	</form>
</body>
</html>