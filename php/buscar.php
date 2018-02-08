 <?php 
 	error_reporting(E_ALL  | E_STRICT);
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo.
	$nombre=$_POST['nombre'];		
	$sql="select * from empleados where nombre='nombre'";
	// echo "string";	
	if ( $objbd->consulta($sql)){
		$fila=$objbd->fetchRow();
		echo $fila[1];
	}
	else{
		echo "no";
	}
	
?>