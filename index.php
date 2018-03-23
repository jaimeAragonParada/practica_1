<!DOCTYPE html>
<head>
	<title>practica_uno</title>
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css"/>	
	<link rel="stylesheet" type="text/css" href="estilos/nivo-slider.css"/>
	<link rel="stylesheet" href="estilos/themes/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="estilos/themes/light/light.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="estilos/themes/dark/dark.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="estilos/themes/bar/bar.css" type="text/css" media="screen" />

</head>
<body onLoad="">
	<!-- contiene todos los elementos -->
	<div id="contenedor">
		<!-- aqui empieza la cabecera -->
		<div id="cabecera">			
			<img src="images/logo-parisina.jpg" class="imgLogo">
			<div class="divNav">
				<ul class="menuSup">
					<li class="activo"><a href="#" title="Enlace genérico" onClick="" >Home</a></li>
					<li><a href="templates/empleados.php" title="Enlace genérico" onClick="">Empleados</a></li>
					<li><a href="templates/clientes.php" title="Enlace genérico" onClick="">Clientes</a></li>
					<li><a href="#" title="Enlace genérico" onClick="">Provedores</a></li>					
					<li><a href="#" title="Enlace genérico" onClick="">Inventario</a></li>					
				</ul>
			</div>
		</div><!-- aqui termina la cabecera -->
		<!-- aqui inicia el menu izquierdo -->
		<div id="divMenuIzq">		
			<ul class="menuIzq">
				<li><a href="#" title="Enlace genérico"onclick="mostrProductos()">Productos</a></li>
				<li><a href="#" title="Enlace genérico" onclick="mostrSucursal()">Sucursales</a></li>
				<li><a href="#" title="Enlace genérico"onclick="mostrPromo()">Promociones</a></li>
			</ul>
		</div><!-- aqui termina el menu izquierdo -->
		<!-- aqui se cargan las vistas-->
		<div id="contenido"> 
			<!-- <div class="divHead">
			    <h1 class="head">BIENVENIDO A PARISINA</h1>     
			</div>
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<img src="images/slide1.jpg">
					<img src="images/slide2.jpg">
					<img src="images/slide3.jpg">
					<img src="images/slide4.jpg">
				</div>				
			</div> -->			
		</div><!-- aqui termina el contenido-->
		<!-- aqui inicia el pie-->
		<div id="pie">
			<p class="">Todos los derechos reservados Parisina 2017</p>
			<p>Cualquier duda pasar a parisina enfrente del mercado 20 de noviembre</p>
			<p class="">Contacto</p>
		</div><!-- aqui se termina el pie-->
	</div>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  	<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>	
  	<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('#contenido').load('vistas/vist_home.php', function(){
         $("#slider").nivoSlider({
            effect: "random",
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            directionNav: true,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false
         });
      });
   });
  	</script>
</body>
</html>


