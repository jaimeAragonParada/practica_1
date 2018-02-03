<?php 
	include("../conexion/base_datos.php");
	$objbd=new BaseDatos();//se declara el  objeto
	$objbd->conectar("localhost","prueba01","root","");//se llama el metodo.	
	$objbd->consulta("select * from empleados");	
?>	
<div class="divHead">
	<h2 class="head">EMPLEADOS</h2>			
</div>
<!-- <div class="divGest"> -->
	<div class="divEma">
		<img class="imgEma" src="../images/elimEmpl.png" onclick="elimEmpl()">
		<img class="imgEma" src="../images/modifEmpl.png" >
		<img class="imgEma" src="../images/agregEmpl.png" onclick="mostrAltasEmpls()"	>
	</div>
	<div class="divSearch">
		<form>
			<input class="inputText"  id="nombre" name="nombre" type="text" size="40" placeholder="Nombre del empleado" />
			<input type="button" onclick="buscarEmpl()" name="search" value="Buscar" class="btnSearch">
			<!-- <a href="#" class="linkImg"><img class="imgEma" src="../images/buscador.png"></a> -->
		</form>
	</div>			
<!-- </div> -->
<div class="divTable">
	<center>
		<form name="" action="" method="post" id="form3" >
			<table id="tblEmpl" class="tblDatos">
			<tr><th>Nombre</th><th>Sueldo</th><th>Turno</th></tr>
			<?php				
				while($fila=$objbd->fetchRow()){						
			?>
				<tr style="background-color:#B0C4DE; cursor:pointer;" id=<?php echo $fila[0];?> onclick="cambColor(<?php echo $fila[0];?>)">				  	
			    <td width="100px" align="center"><?php echo $fila[1];?></td>
				<td width="200px" align="center"><?php echo $fila[2];?></td>
				<td width="200px" align="center"><?php echo $fila[3];?></td>	
			</tr>			
			<?php			  

			
				}
			?>
			</table>
		</form >
	</center>
</div>
		
