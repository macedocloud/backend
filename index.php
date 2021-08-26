<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if (isset($_POST['nombre']) && isset($_POST['funcion']) && $_POST['funcion']=='getName') {

	$nombre = $_POST['nombre'];
	 $consulta = "SELECT * FROM usuarios where nombre = '".$nombre."'";
	 $link = mysqli_connect("localhost", "root", "", "cursoifcd37");
    
	if (!$link) {
		echo ("fallo en la conexion: " . (mysqli_connect_errno()) . " -  " . (mysqli_connect_error()));
	} else {
	} 
	$resultado = mysqli_query($link, $consulta);
	
	if ($resultado->num_rows > 0) {
		while ($respuesta = $resultado->fetch_assoc()) {
			$res[] = $respuesta;
		}
	}else{
		$res[]=""; 
	}
	
	echo json_encode($res);
	mysqli_close($link);
}
?>
