<!DOCTYPE html>
<html>
<head>
	<title>practica_uno</title>
	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">	
</head>
<body onload="mostrVistEmpl()">
	<!-- contiene todos los elementos -->
	<div id="contenedor">
		<!-- aqui empieza la cabecera -->
		<div id="cabecera">			
			<img src="../images/logo.jpg" class="imgLogo">
			<div class="divNav">
				<ul class="menuSup">
					<li><a href="../index.php" title="Enlace genérico" onclick="">Home</a></li>
					<li><a href="#" title="Enlace genérico" onclick="">Empleados</a></li>
					<li><a href="../templates/clientes.php" title="Enlace genérico" onclick="">Clientes</a></li>
					<li><a href="#" title="Enlace genérico" onclick="">Provedores</a></li>					
					<li><a href="#" title="Enlace genérico" onclick="">Inventario</a></li>					
				</ul>
			</div>
		</div><!-- aqui termina la cabecera -->
		<!-- aqui inicia el menu izquierdo -->
		<div id="divMenuIzq">
			<ul class="menuIzq">
				<li><a href="#" title="Enlace genérico" onclick="mostrSucurs()">Sucursales</a></li>
				<li><a href="#" title="Enlace genérico"onclick="mostrPromo()">Promociones</a></li>						
			</ul>
		</div><!-- aqui termina el menu izquierdo -->
		<!-- aqui se cargan las vistas-->
		<div id="contenido"> 

		</div><!-- aqui termina el contenido-->
		<!-- aqui inicia el pie-->
		<div id="pie">
			<p class="pPie1">Todos los derechos reservados Parisina 2017</p>
			<p>Cualquier duda pasar a parisina enfrente del mercado 20 de noviembre</p>
			<p class="pPie2">Contacto</p>
		</div><!-- aqui se termina el pie-->
	</div>
	<script type="text/javascript" src="../js/funciones.js"></script>
</body>
</html>
