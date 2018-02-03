<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo.
	$nombre=$_POST['nombre'];	
	$sueldo=$_POST['sueldo'];
	$turno=$_POST['turno'];
	$respuesta="";
	$sql="insert into empleados(nombre, sueldo,turno) values('$nombre','$sueldo','$turno')";	
	if ( $result=$objbd->consulta($sql)){
		echo "Empleado registrado";
	}
	else{
		echo "El empleado no se pudo registrar";
	}
	
?>


