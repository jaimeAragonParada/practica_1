<?php
$nombre=$_POST["nombre"];
require("../conexion/base_datos.php");
$objbd=new BaseDatos();
$sql="select * from empleados where nombre='$nombre'";
$objbd->consulta($sql);
while ($objbd->fetchRow()) {
	
}
?>