

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
	

<?php
	$linea1="SELECT * FROM empleados ";
	$consulta=$linea1;
//echo $consulta;
if ( ! $link=mysql_connect('localhost','root','root'))
	{
echo "<a href=index.php>Error al conectar</a>";
	exit ;
	}
if ( ! mysql_select_db("prueba01"))
	{
echo "<a href=/index.php>Error al seleccionar BDD</a>";
	exit;
	}
if ( ! $result=mysql_query($consulta,$link))
	{
	echo "<a href=/index.php>Error en la consulta</a>";
exit;
	}
	echo "<h4>Seleccione empleado/s a dar modificar</h4>";
	echo "<CENTER>";
	echo "<FORM ACTION=modif2.php METHOD=POST>";
	echo "<TABLE BORDER=3>";
for ($i=1;$i<mysql_numrows($result);$i++)
	{
	$id=mysql_result($result,$i,"id_empleado");
	$nombre=mysql_result($result,$i,"nombre");
	echo "<TR><TD><INPUT type='radio' name='modif'
	value='id_empleado'></TD><TD>$nombre</TD></TR>";
	}
	echo "</TABLE>";
	echo "<INPUT type='submit' value='Modif'>";
	echo "</FORM>";
	echo "</CENTER>";
mysql_close($link);
?>

	
</body>
</html>
