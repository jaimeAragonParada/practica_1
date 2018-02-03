<?php
$nombre=$_POST["nombre"];
require("../conexion/base_datos.php");
$objbd=new BaseDatos();
$objbd->conectar("localhost","prueba01","root","");
$sql="select * from empleados where nombre='$nombre'";
$objbd->consulta($sql);
while ($fila=$objbd->fetchRow()) {
	
	$empleadosEncontr=array();
	//echo json_encode($fila);
	for ($i=0; $i <sizeof($fila) ; $i++) { 
		if ($fila[$i]==$nombre) {
			// echo $fila[$i];
			array_push($empleadosEncontr, $fila);
			
		}
	}
	echo json_encode($empleadosEncontr);
}
?>








