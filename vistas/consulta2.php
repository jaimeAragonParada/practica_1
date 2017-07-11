<?php 
	include("conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo.	
	$result=$objbd->consulta("select * from empleados");
	$conc="martes";
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
	import_request_variables("p","f_");
	$linea1="SELECT * FROM empleados ORDER BY id_empleado, nombre DESC";
	$consulta=$linea1;
//echo $consulta;
	if ( ! $link=mysql_connect('localhost','root','root'))
	{
	echo "<a href=consEmp.php>Error al conectar</a>";
	exit ;
	}
if ( ! mysql_select_db("prueba01"))
	{
	echo "<a href=cosulta2.php>Error al seleccionar BDD</a>";
	exit;
	}
if ( ! $result=mysql_query($consulta,$link))
	{
	echo"<a href=consulta2.html>Error en la consulta</a>";
exit;
	}
	echo "<h2>Empleados</h2>";
	echo "<CENTER>";
	echo "<TABLE BORDER=1>";
	echo
	"<TR><TD>id_empleado</TD><TD>nombre</TD><TD>sueldo</TD><TD>turno</TD><TD></TR>";

for ($i=0;$i<mysql_numrows($result);$i++)
	{
if ($f_cambio && ($i%2))
	echo "<TR bgcolor='#B6B7B7'>";
else
	echo "<TR bgcolor='white'>";
	print("<TD>".mysql_result($result,$i,"id_empleado")."</TD>");
	print("<TD>".mysql_result($result,$i,"nombre")."</TD>");
	print("<TD>".mysql_result($result,$i,"sueldo")."</TD>");
	print("<TD>".mysql_result($result,$i,"turno")."</TD>");
	echo "</TR>";
	}
	echo "</TABLE>";
	echo "</CENTER>";
mysql_close($link);
?>

	
</body>
</html>
