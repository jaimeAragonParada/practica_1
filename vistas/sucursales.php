<?php
include("../conexion/base_datos.php");
$objbd=new BaseDatos();
$objbd->conectar("localhost","prueba01","root","");
?>	
<div class="divHead">
	<h2 class="head">HUBICACION</h2>			
</div>

<script>
var map; var geocoder;
var mi_ubic; var ubic; var destino;   
var tipo_lugar; var tipo_lug;
var lat_env; var long_env;
var infoWindow;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

if(navigator && navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(geoOK, geoError);
}
else {
  geoMaxmind();
}

function geoOK(position) {
  cargarMapa(position.coords.latitude, position.coords.longitude);
}

function geoMaxmind() {
  cargarMapa(geoip_latitude(),geoip_longitude());
}

function geoError(err) {
  if (err.code == 1) {
    error('El usuario ha denegado el permiso para obtener informacion de su ubicacion.');
  } else if (err.code == 2) {
    error('Su ubicacion no se puede determinar.');
  } else if (err.code == 3) {
    error('Tiempo de espera excedido')
  } else {
    error('Ocurri� un error.');
  }
}

function cargarMapa(lat, lon)
{
  mi_ubic = new google.maps.LatLng(lat,lon);
  
  var opcionesMapa = {
    zoom: 16,
    center: mi_ubic,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  map = new google.maps.Map(document.getElementById('map-canvas'),opcionesMapa);
  google.maps.event.addListener(map,'click', function(event) {
    findAddress(event.latLng);
  });
  
  var marcador = new google.maps.Marker({
    position: mi_ubic,
    icon: mi_marcador,
    title:"Esta es tu ubicacion",
    draggable:true,
    animation: google.maps.Animation.DROP
  });
  
  marcador.setMap(map);
  mi_direcc(mi_ubic);
}

function lugares() {
  tipo_lugar = document.getElementById('tipo').value;
  var sel = document.getElementById('tipo');
  tipo_lug = sel.options[sel.selectedIndex].text;
  
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: mi_ubic,
      zoom: 15
  });

    var solicitud = {
    location: mi_ubic,
      radius: 1000,
      types: [tipo_lugar]
  };

  infowindow = new google.maps.InfoWindow();
  var servicio = new google.maps.places.PlacesService(map);
  servicio.nearbySearch(solicitud, llamada);
  
  google.maps.event.addListener(map,'click', function(event) {
    obtDireccion(event.latLng);
  });
}

function llamada(resultados, estado) {
  var marcador = new google.maps.Marker({
    position: mi_ubic,
      icon: mi_marcador,
      title:"Tu ubicacion",
      draggable:true,
      animation: google.maps.Animation.DROP
  });
  
  marcador.setMap(map);
  if (estado == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < resultados.length; i++) {
      crearMarcadores(resultados[i]);
    }
  }
}

function crearMarcadores(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    var marc = marker;
    var latLon = marc.getPosition();
    var latitud = latLon.lat(); lat_env=latitud;
    var longit = latLon.lng(); long_env=longit;
    
    var nom_lugar=place.name;
    document.getElementById("lugar").value=nom_lugar;
document.getElementById("t_lugar").value=tipo_lug;
    infowindow.setContent(nom_lugar);
    infowindow.open(map, this);
    obtDireccion(latLon);
    destino = latLon;

  });
}

function mi_direcc(loc)
{

  geocoder = new google.maps.Geocoder();
  if (geocoder)
  {
    geocoder.geocode({'latLng': loc}, function(resultados, estado) 
    {
      if (estado == google.maps.GeocoderStatus.OK) 
      {
        if (resultados[0]) 
        { 
          address = resultados[0].formatted_address;
          document.getElementById('ubicacion').value = address;
            }
      } 
    });
  }
}

function obtDireccion(loc)
{
  geocoder = new google.maps.Geocoder();
  
  if (geocoder)
  {
    geocoder.geocode({'latLng': loc}, function(resultados, estado) 
    {
      if (estado == google.maps.GeocoderStatus.OK) 
      {
        if (resultados[0]) 
        { 
          address = resultados[0].formatted_address;
          document.getElementById('direccion').value = address;
            }
      } 
    });
  }
}

function obtenerRuta() {
  if (destino == null) {
    alert("Elija un destino");
    return;
  }
  
  var modo;
  switch (document.getElementById("tipo_ruta").value) {
      case "driving": modo = google.maps.DirectionsTravelMode.DRIVING; break;
    case "walking": modo = google.maps.DirectionsTravelMode.WALKING; break;
    }
    
  var request = {
        origin: mi_ubic,
        destination: destino,
        travelMode: modo,
        provideRouteAlternatives: true
    };
    
    var panel = document.getElementById('panel_ruta');
  directionsService.route(request, function(respuesta, estado) {
    if (estado == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setMap(map);
          directionsDisplay.setPanel(panel);
          directionsDisplay.setDirections(respuesta);
    }
  });
  
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setMap(map);
      directionsDisplay.setDirections(response);
    }
  });
}


}
</script>
</head>

<body>
<div id="main">
  <header>
      <div id="logo" >
          <div id="logo_text" style="width:50%; float:left">
              <h1><img src="images/local.png" height="58" width="65">encuentra tu lugar</h1>
            </div>
            <div id="blogin" style="width:30%; float:right">
        
          </div>

        </div>
        
  <div id="cnt" align="center">

        <div id="name"> </div>
      <img id="image"/>
        </div>
  </header>


</script>
<br>

<div id="site_content">
  <div id="map-canvas">
  </div>
    
  <div id="panel_ruta">        
    <label> Seleccione un lugar </label>
    <select id="tipo" onChange="lugares();" >
    <option> - </option>
        <option value="bank"> Banco </option>
        <option value="cafe"> Cafe </option>
        <option value="bar"> Bar </option>
        <option value="restaurant"> Restaurant </option>
        <option value="accounting"> Despacho contable </option>
        <option value="hospital"> Hospital </option>
        <option value="airport"> Aeropuerto </option>
        <option value="art_gallery"> Galer&iacute;a de Arte </option>
        <option value="atm"> Cajero Autom&aacute;tico </option>
        <option value="bakery"> Panader&iacute;a </option>
        <option value="book_store"> Librer&iacute;a </option>
        <option value="library"> Biblioteca </option>
        <option value="bus_station"> Terminal de transporte </option>
        <option value="car_repair"> Autopartes </option>
        <option value="car_wash"> Lava autos </option>
        <option value="cemetery"> Cementerio </option>
        <option value="church"> Iglesia </option>
        <option value="clothing_store"> Tienda de Ropa </option>
        <option value="dentist"> Dentista </option>
        <option value="electronics_store"> Electronica en general </option>
        <option value="doctor"> M&eacute;dico general </option>
        <option value="electrician"> Servicios en electronica </option>
        <option value="finance"> Servicios financieros </option>
        <option value="florist"> Florer&iacute;a </option>
        <option value="funeral_home"> Servicios funerarios </option>
        <option value="furniture_store"> Tienda de muebles </option>
        <option value="gas_station"> Gasolinera </option>
        <option value="hair_care"> Est&eacute;tica </option>
        <option value="grocery_or_supermarket"> Comestibles/Supermercado </option>
        <option value="gym"> Gimnasio </option>
        <option value="hardware_store"> Ferreter&iacute;a </option>
        <option value="health"> Cl&iacute;nica </option>
        <option value="night_club"> Club nocturno </option>
        <option value="jewelry_store"> Joyer&iacute;a </option>
        <option value="movie_theater"> Cine </option>
        <option value="lawyer"> Despacho Juridico / Abogados </option>
        <option value="liquor_store"> Tienda de licores </option>
        <option value="local_government_office"> Oficinas locales </option>
        <option value="museum"> Museo </option>
        <option value="lodging"> Hotel </option>
        <option value="shopping_mall"> Tienda departamental </option>
        <option value="park"> Parque </option>
        <option value="school"> Escuela </option>
        <option value="pharmacy"> Farmacia </option>
        <option value="shoe_store"> Zapater&iacute;a </option>
        <option value="stadium"> Estadio </option>
        <option value="taxi_stand"> Sitio de taxis </option>
        <option value="travel_agency"> Agencia de viajes </option>
        <option value="university"> Universidad </option>
        <option value="veterinary_care"> Veterinaria </option>
      </select>
      
      <label id="l2" style="display:none"> Como llegar </label>
      <select name="tipo_ruta" id="tipo_ruta" style="display:block">
        <!-- <select id="tipo_ruta" style="display:none"> -->
        <option value="driving"> En autom&oacute;vil </option>
        <option value="walking"> A pie </option>
      </select>
      <input id="b1" type="button" value="Obtener ruta" onClick="obtenerRuta()" style="display:block"/>
<!--            <input id="b1" type="button" value="Obtener ruta" onclick="obtenerRuta()" style="display:none"/> -->
      
      <div id="panel" >
      </div>
      
  <form id="formulario" method="POST"> 
    <label id="l1"style="display:none"> Direcci�n </label>
      <textarea name="direccion" id="direccion" cols="30" rows="7" readonly />        
</textarea>
<textarea name="ubicacion" id="ubicacion" cols="30" rows="7" readonly style="display:none"/></textarea>
        <p> <input type="text" name="nombre" id="nombre" style="display:none"/></p>
  <p> <input type="text" name="t_lugar" id="t_lugar" style="display:none"/></p>
        <input type="text" name="lugar" id="lugar" style="display:none" />
        
        <!--guardar en la base de datos-->
    <p> <input type="submit" name="boton" id="boton" value="Guardar Informaci&oacute;n" /> </p>
  </form>
  </div> <!-- panel_ruta -->



</body>
</html>
