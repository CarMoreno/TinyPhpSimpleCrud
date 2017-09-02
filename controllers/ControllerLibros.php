<?php 
require_once dirname(__FILE__).'/../conexion/Conexion.php';
$libroController = new ControllerLibros();

if(isset($_POST['btnEnviar'])) {//para crear
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$libroController->insertar_libro($codigo, $nombre, $descripcion);
}

if(isset($_GET['btnBuscar'])) {//para buscar
	$termino = $_GET['termino'];
	$libroController->buscar_libro($termino);
}
if (isset($_GET['edit'])) {//Redirije a la pagina para editar
	$cod_edit = $_GET['edit'];
	$libroController->buscar_libro($cod_edit);

}
if(isset($_POST['btnEditar'])){
	$codigo = $_POST['micodigo'];
	$nuevoNombre = $_POST['nuevoNombre'];
	$nuevaDescripcion = $_POST['nuevaDescripcion'];
	$libroController->actualizar_libro($nuevoNombre, $nuevaDescripcion, $codigo);
	echo "nuevoNombre: ".$nuevoNombre;
	echo "<br> nuevaDescripcion: ".$nuevaDescripcion;
	echo "<br> codigo".$codigo;
}
if(isset($_GET['delete'])) {//para eliminar
	$cod_delete = $_GET['delete'];
	$libroController->delete_libro($cod_delete);
}


class ControllerLibros {

	private $libros;
	private $unLibro;

	public function __construct(){
		$this->libros = array();
		$this->unLibro = array();
	}

	public function get_libros() {
		$query = "SELECT * FROM libros ORDER BY nombre";
		$exec = pg_query(Conexion::conex(), $query);
		//mientras siga habiendo registros (la variable $registro siga estando seteada)
		while($registro = pg_fetch_array($exec, null, PGSQL_ASSOC)){
			$this->libros[] = $registro;
		}
		return $this->libros;
	}

	public function insertar_libro($codigo, $nombre, $descripcion)
	{
		$query = "INSERT INTO libros(codigo, nombre, descripcion) VALUES ('$codigo', '$nombre', '$descripcion')";
		$exec = pg_query(Conexion::conex(), $query);
		if($exec) {
			header('Location: ../index.php');
		}
		else {
			echo "Un error ha ocurrido, <a href='../vistas/nuevoLibro.php'>Intente nuevamente</a>";
		}
	}

	public function actualizar_libro($nuevo_nombre, $nueva_descripcion, $codigo) {
		$query = "UPDATE libros SET nombre = '$nuevo_nombre', descripcion = '$nueva_descripcion'
				WHERE codigo = $codigo";
		$exec = pg_query(Conexion::conex(), $query);		
		header('Location: ../index.php');
	}

	public function buscar_libro($termino)
	{
		$query = "SELECT * FROM libros WHERE nombre LIKE '%$termino%'";
		$exec = pg_query(Conexion::conex(), $query);
		if($exec) {
			$this->unLibro = pg_fetch_array($exec, null, PGSQL_ASSOC);
			// print_r($this->unLibro['nombre']);
			header('Location: ../vistas/resultadoBusqueda.php?nombre='.$this->unLibro['nombre'].'&descripcion='.$this->unLibro['descripcion'].'&codigo='.$this->unLibro['codigo']);
		}
		else {
			"No se hallaron resultados <a href='../index.php'>Intente nuevamente</a>";
		}
	}

	public function delete_libro($codigo) {
		$query = "DELETE FROM libros WHERE codigo = $codigo";
		$exec = pg_query(Conexion::conex(), $query);
		header('Location: ../index.php');
	}
}
 ?>
