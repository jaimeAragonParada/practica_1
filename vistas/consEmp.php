

<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","root");//se llama el metodo.	
	//$result=$objbd->consulta("select * from empleados");
	//$conc="martes";
?>

<body>
	<div id="contenedor">
		
		
		<div id="contenido">


 	
		<div class="encabezadoTabla">
			<h2 class="encab">
				Consulta Empleado
			</h2>
			
		</div>
	

		
 	
<?php
	$linea1="SELECT * FROM empleados ORDER BY nombre";
	$consulta=$linea1;
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
	
	echo "<CENTER>";
	echo "<TABLE BORDER=2>";
	echo "<TR><TD>id_empleado</TD><TD>Nombre</TD><TD>sueldo</TD><TD>Turno</TD></TR>";
for ($i=0;$i<mysql_numrows($result);$i++)
{
	echo "<TR>";
	$id_empleado=mysql_result($result,$i,"id_empleado");
	echo "<TD>$id_empleado</TD>";

	$nombre=mysql_result($result,$i,"nombre");
	echo "<TD>$nombre</TD>";
	$sueldo=mysql_result($result,$i,"sueldo");
	echo "<TD>$sueldo</TD>";
	$turno=mysql_result($result,$i,"turno");
	echo "<TD>$turno</TD>";

	echo "</TR>";
}
	echo "</TABLE>";
	echo "</CENTER>";
mysql_close($link);
?>
	
</body>
</html>
