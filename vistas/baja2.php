

<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","root");//se llama el metodo.	
	// $result=$objbd->consulta("select * from empleados");
	// $conc="martes";
?>

<body>
	<div id="contenedor">
		
		
		<div id="contenido">


 	
		<div class="encabezadoTabla">
			<h2 class="encab">
				Baja Empleados
			</h2>
			
		</div>


<?php
import_request_variables("P","f_");
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

foreach($f_borrar as $indice => $valor)
{
if ($valor=="on")
{

$linea1="DELETE FROM empleados";
$linea2=" WHERE id='$indice' ";
$consulta=$linea1.$linea2;
//echo "$consulta";
if ( ! $result=mysql_query($consulta,$link))
{
echo "<a href=index.php>Error en el borrardo</a>";
exit;
}}
}
echo "<br>Borrado correcto";
echo "<br><br><a href='vistas/baja.php'>Otra baja</a>";
echo "<br><br><a href='index.php'>Inicio</a>";
mysql_close($link);
?>
</body>
</html>
	
</body>
</html>
