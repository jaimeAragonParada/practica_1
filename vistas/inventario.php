

<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","root");//se llama el metodo.	
	$result=$objbd->consulta("select * from inventario");
	$conc="martes";
?>

<body>
	<div id="contenedor">
		
		
		<div id="contenido">


 	
		<div class="encabezadoTabla">
			<h2 class="encab">
				INVENTARIO
			</h2>
			
		</div>
	

		<?php


				//echo "<h2>INVENTARIOS</h2>";
			 		//echo "<h2>INVENTARIOS</h2>";
			 	echo "<center>";
		    	echo "<TABLE BORDER=1>";
				echo "<TR><TD></TD><id_inventario></TD><TD>Fecha</TD><TD>Articulo</TD><TD>Piezas</TD><TD>precio</TD></TR>";

				for ($i=0;$i<mysql_numrows($result);$i++)
					{
					echo "<TR>";
					print("<TD>".mysql_result($result,$i,"id_inventario")."</TD>");
					print("<TD>".mysql_result($result,$i,"fecha")."</TD>");
					print("<TD>".mysql_result($result,$i,"articulo")."</TD>");
					print("<TD>".mysql_result($result,$i,"piezas")."</TD>");
					print("<TD>".mysql_result($result,$i,"precio")."</TD>");

					echo "</TR>";
				}
				echo "</TABLE>";
				echo "</CENTER>";
			?>
		
	
</body>
</html>
