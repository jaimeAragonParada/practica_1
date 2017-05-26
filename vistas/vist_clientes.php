<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo.	
	$result=$objbd->consulta("select * from clientes");
	$conc="martes";
?>
		<div class="divHead">
			<h2 class="head">
				CLIENTES
			</h2>
		</div>	

		<?php
			 	echo "<center>";
		    	echo "<TABLE BORDER=1>";
				echo "<TR><TD></TD><id_Clientes></TD><TD>Nombre</TD>
					<TD>Direccion</TD><TD>Telefono</TD></TR>";

				for ($i=0;$i<mysql_numrows($result);$i++)
					{
					echo "<TR>";
					print("<TD>".mysql_result($result,$i,"id_cliente")."</TD>");
					print("<TD>".mysql_result($result,$i,"nombre")."</TD>");
					print("<TD>".mysql_result($result,$i,"direccion")."</TD>");
					print("<TD>".mysql_result($result,$i,"telefono")."</TD>");

					echo "</TR>";
				}
				echo "</TABLE>";
				echo "</CENTER>";
			?>	
	
