<?php
echo "ok";
include("../conexion/base_datos.php");
$usuario=$_POST['USUARIO'];
$password=$_POST['PASSWORD'];
$respuesta="";

	$sql="insert into usuarios(usuario, password) values('$usuario','$password')";	
	if ( $result=$objbd->consulta($sql)){
		echo "usuario registrado";
	}
	else{
		echo "El usuario no se pudo registrar";
	}
	
?>
