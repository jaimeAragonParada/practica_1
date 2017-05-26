

<?php 
	include("base_datos.php");
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
				JSON
			</h2>
			
		</div>
	

		
		
  <?

         	$miArray_semana = array("lunes","martes","miercoloes","jueves","viernes","sabado","domingo");
         	 print_r(json_encode($miArray_semana));
        /* $miMesArray = array("enero","febrero","marzo","Abril","mayo","junio","Julio","Agosto","septiembre","noviembre","diciembre");
         print_r(json_encode($miMesArray));*/

        /* $signosArray = array("capricornio","sagitario","leo");
         print_r(json_encode($signosArray)) ;*/


		/*$miArray = array (utf8_decode("París")=>"Francia","Madrid"=>utf8_encode("España"));
		    print_r(json_encode($miArray));	*/
	    
	   
		?>
		</div>
		<div id="pie">
		<p class="pPie1">Todos los derechos reservados Parisisina 2017</p>
		<p>Cualquier duda pasar a parisina enfrente del mercado 20 de noviembre</p>
		</div>
	</div>
	
</body>
</html>
