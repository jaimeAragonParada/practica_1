

<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","root");//se llama el metodo.	
	$result=$objbd->consulta("select * from proveedores");
	$conc="martes";
?>

<body>
	<div id="contenedor">
		
		
		<div id="contenido">


 	
		<div class="encabezadoTabla">
			<h2 class="encab">
				PROVEEDORES
			</h2>
			
		</div>
	

		<?php


				//echo "<h2>INVENTARIOS</h2>";
			 		//echo "<h2>INVENTARIOS</h2>";
			 	echo "<center>";
		    	echo "<TABLE BORDER=1>";
				echo "<TR><TD></TD><id_proveedores></TD><TD>Nombre</TD><TD>producto</TD><TD>lugar</TD></TR>";

				for ($i=0;$i<mysql_numrows($result);$i++)
					{
					echo "<TR>";
					print("<TD>".mysql_result($result,$i,"id_proveedores")."</TD>");
					print("<TD>".mysql_result($result,$i,"nombre")."</TD>");
					print("<TD>".mysql_result($result,$i,"productos")."</TD>");
					print("<TD>".mysql_result($result,$i,"lugar")."</TD>");

					echo "</TR>";
				}
				echo "</TABLE>";
				echo "</CENTER>";
			?>
		
	
</body>
</html>
