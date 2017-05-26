

<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","root");//se llama el metodo.	
	$result=$objbd->consulta("select * from empleados");
	$conc="martes";
?>

<body>
	<div id="contenedor">
		
		
		<div id="contenido">


 	
		<div class="encabezadoTabla">
			<h2 class="encab">
				Empleado
			</h2>
			
		</div>
	

modif3.php
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>modif3</title>
<meta name="GENERATOR" content="Quanta Plus">
<meta http-equiv="Content-Type" content="text/html; charset=iso-
8859-1">
Programación en PHP a través de ejemplos 34
</head>
<body>
<?php
import_request_variables("P","f_");
$linea1="UPDATE empresas ";
$linea2=" SET nombre='$f_nombre', web='$f_web', telef='$f_telef',
sector='$f_sector', descrip='$f_descrip', karma='$f_karma' ";
$linea3=" WHERE id='$f_id' ";
$consulta=$linea1.$linea2.$linea3;
echo $consulta;
if ( ! $link=mysql_connect('localhost','root',''))
{
echo "<a href=index.html>Error al conectar</a>";
exit ;
}
if ( ! mysql_select_db("buscador"))
{
echo "<a href=index.html>Error al seleccionar BDD</a>";
exit;
}
if ( ! $result=mysql_query($consulta,$link))
{
echo "<a href=index.html>Error en la consulta</a>";
exit;
}
echo "<br>Modif correcta";
echo "<br><br><a href='modif.php'>Otra modif</a>";
echo "<br><br><a href='index.html'>Inicio</a>";
mysql_close($link);
?>
</body>
</html>