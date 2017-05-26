<?php 
	include("../conexion/base_datos.php");
	$idEmpl=$_POST['idEmpl'];
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo conectar
	$sql="delete from empleados where id_empleado='$idEmpl'";	
	$respuesta=$objbd->consulta($sql);
	if ($respuesta) 
		echo "true";
	else
		echo "false";
?>