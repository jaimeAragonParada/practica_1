<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo.	
	$result=$objbd->consulta("select * from promociones");
	$conc="martes";
?>
<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">	
<body>
 <div class ="divHead">
 
     <h2> <font color="blue"< style="cursor:help">OFERTA DEL MES!!!</font></h2>
     </div>
  <table border=2>
  </table>
  </body>

 <?php          
                
			 	echo "<center>";
		    	echo "<TABLE BORDER=2>";
				echo "<TR><TD></TD><id_producto></TD><TD>Producto </TD>
				    <TD>Descuento %</TD>
				    <TD>Mes</TD></TR>";

				for ($i=0;$i<mysql_numrows($result);$i++)
					{
					echo "<TR>";
					print("<TD>".mysql_result($result,$i,"id_producto")."</TD>");
					print("<TD>".mysql_result($result,$i,"producto")."</TD>");
					print("<TD>".mysql_result($result,$i,"descuento")."</TD>");
					print("<TD>".mysql_result($result, $i,"mes")."</TD>");
					
					echo "</TR>";
				}
				echo "</TABLE>";
				echo "</CENTER>";
			?>	
	







