<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Library</title>
</head>
<body>
	<h2>Nuevo Libro</h2>
	<form action="../controllers/ControllerLibros.php" method="POST">
		<label for="codigo"></label>
		<input id="codigo" name="codigo" type="number" min="1" placeholder="Código"><br>
		<label for="nombre"></label>
		<input id="nombre" name="nombre" type="text" placeholder="Título"><br>
		<label for="descripcion"></label>
		<textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br>
		<input type="submit" name="btnEnviar" value=">> Insertar nuevo libro">

	</form>
</body>
</html>