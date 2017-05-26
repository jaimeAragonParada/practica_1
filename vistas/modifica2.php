

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
	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
Programación en PHP a través de ejemplos 32
<head>
<title>modif2</title>
<meta name="GENERATOR" content="Quanta Plus">
<meta http-equiv="Content-Type" content="text/html; charset=iso-
8859-1">
</head>
<body>
<?php
import_request_variables("P","f_");
$linea1="SELECT * FROM empleados ";
$linea2=" WHERE id='$f_modif' ";
$consulta=$linea1.$linea2;
//echo $consulta;
if ( ! $link=mysql_connect('localhost','root','root'))
{
echo "<a href=index.php>Error al conectar</a>";
exit ;
}
if ( ! mysql_select_db("prueba01"))
{
echo "<a href=index.php>Error al seleccionar BDD</a>";
exit;
}
if ( ! $result=mysql_query($consulta,$link))
{
echo "<a href=index.php>Error en la consulta</a>";
exit;
}
?>
<h2>Modif de empresa</h2>
<center>
<FORM action='vista/modifica3.php' method='POST'>
<TABLE border=0>
<TR>
<TD>id_empleado</TD>
<TD><INPUT type='text' name='id_empleado' size='30' maxlength='30'
value='<?php print(mysql_result($result,0,'id_empleado')); ?>' ></TD>
</TR>
<TR>

<TD>nombre</TD>
<TD><INPUT type='text' name='nombre' size='30' maxlength='30'
value='<?php print(mysql_result($result,0,'web')); ?>'></TD>
</TR>
<TR>
<TD>sueldo</TD>
<TD><INPUT type='text' name='sueldo' size='20' maxlength='20'
value='<?php print(mysql_result($result,0,'telef')); ?>'></TD>
</TR>
<TR>
<TD>turno</TD>
<TD><INPUT type='text' name='turno' size='30' maxlength='30'
value='<?php print(mysql_result($result,0,'sector')); ?>'></</TD>
</TR>
</table>
<INPUT type='hidden' name='id' value='<?php
print(mysql_result($result,0,'id')); ?>'>
<INPUT type='submit' value='Aceptar'>
</FORM>
</center>
<?php
mysql_close($link);
?>
</body>
</html>