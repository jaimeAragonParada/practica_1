	
function XMLHTTP()
			{
				  	var Object;
						if (typeof XMLHttpRequest == "undefined" )
						 {
							if(navigator.userAgent.indexOf("MSIE 5") >= 0)
							{ 
								Object= new ActiveXObject("Microsoft.XMLHTTP");
							}
							else{ 
								Object=new ActiveXObject("Msxml2.XMLHTTP");
							}
						}
						else{ 
							Object=new XMLHttpRequest();
						}
						return Object;
					
			}	

			
			function mostrHome(){
				// alert('siii');
			    var ajax = XMLHTTP();	
				ajax.open("POST","vistas/vist_home.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
		     }
			
			function mostrPrincipal(){
				// alert('siii');
			    var ajax = XMLHTTP();	
				ajax.open("POST","../vistas/vist_principal.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			}


			function mostrVistEmpl(){
				// alert('sii');
			    var ajax = XMLHTTP();	
				ajax.open("POST","../vistas/vist_empleados.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			}
			function mostrVistClient(){
			    var ajax = XMLHTTP();	
				ajax.open("POST","../vistas/vist_clientes.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			}
			function mostrVistEmplBuscado(resp){
				//alert('sii');
			    var ajax = XMLHTTP();	
				ajax.open("POST","../vistas/vist_empleadoBuscar.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send("resp="+resp);
			}
			function cambColor(idEmpl){
				//alert(num);
				fila=document.getElementById(idEmpl);
				var color=fila.style.backgroundColor;
				//alert(color);
				if(color=='blue')
				fila.style.backgroundColor="#B0C4DE"
				else
				fila.style.backgroundColor="blue"
			}
			function elimEmpl(){
				//alert("rrrrrrrr");
				var tabla = document.getElementById('tblEmpl');
				var filas = tabla.rows;
				var selecc= new Array();
				var idsEmpl=new Array();
				var seleccionados= new Array();
				for(var x=1; x<filas.length; x++) {
					var fila = filas[x];
					if(fila.style.backgroundColor=="blue"){	
						seleccionados.push(x);	
						}
				}
				if(seleccionados.length>1 || seleccionados<1)
					alert("seleccione un registro");
				else{
					if(confirm("¿Desea elimnar el usuario?")){
						for(var x=1; x<filas.length; x++) {
							var fila = filas[x];
							if(fila.style.backgroundColor=="blue"){
								var id=fila.id
								selecc.push(x);
								idsEmpl.push(id);
							}
						}
						for(var y=0; y<selecc.length; y++) {
							var pos=selecc[y];
							if(y==0)
								elimEmpl2(pos);
							else{
								pos--;
								elimEmpl2(pos);
							}		
						}
						for(var z=0;z<idsEmpl.length;z++){
							var idEmpl=idsEmpl[z];
							elimRegEmpl(idEmpl);
						}
					}
				}
			}

			function elimEmpl2(pos){
				//alert("rrrrrrrr");
				var tabla = document.getElementById('tblEmpl');
				tabla.deleteRow(pos);
			}

			function elimRegEmpl(idEmpl){	
				//alert(numEmpl);
				var ajax = XMLHTTP();	
				ajax.open("POST","../php/elimEmpl.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4)
				  {
					var respuesta=ajax.responseText;
			        //document.getElementById('contenido').innerHTML=respuesta;
			        if (respuesta=='true') 
						alert('eliminado');
					else
						alert('No se pudo eliminar el <registro></registro>');
				  }
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send("idEmpl="+idEmpl);
			}
			
			function mostrAltasEmpls(){
			    var ajax = XMLHTTP();	
				ajax.open("POST","../vistas/altasEmpleados.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			}
			function ejecAlta(){
				var nombre=document.getElementById('nombreEmpl').value;
				var sueldo=document.getElementById('sueldoEmpl').value;
				var turno=document.getElementById('turnoEmpl').value;
				//alert(turno);
				if (turno!="Seleccionar") {
					if (validar("formEmpl")){
						//alert("sss");
					    var ajax = XMLHTTP();	
			
					ajax.open("POST","../php/ejecAlta.php",true);				
						ajax.onreadystatechange=function()
						{
						  if(ajax.readyState==4){
						  	var respuesta=ajax.responseText;
						  	alert(respuesta);
						  	mostrVistEmpl();					  	
		        			//document.getElementById('contenido').innerHTML=respuesta;
						  }	
						}
						ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
						ajax.send("nombre="+nombre+"&sueldo="+sueldo+"&turno="+turno);
					}
				}
				else
					alert("Seleccone un turno");
			}
function buscarEmpl(){
	// alert('siii');
	var nombre=document.getElementById("nombreEmpl").value;	
	if (nombre!="") {
		var ajax = XMLHTTP();	
		ajax.open("POST","../php/buscarEmpl.php",true);
		ajax.onreadystatechange=function()
		{
		  if(ajax.readyState==4){
			  	var respuesta=ajax.responseText;
			  	mostrVistEmplBuscado(respuesta);
			  	// alert(respuesta);
	        	// document.getElementById('contenido').innerHTML=respuesta;
			}	
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("nombre="+nombre);
	}
	else{
		alert("Introduzca un nombre");
		document.getElementById("nombreEmpl").focus();
	}
}
function validarNum(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validar(idForm){
	//alert(nomForm);	
	camposTexto = document.getElementById(idForm).elements; 
	//alert(camposTexto);
	for (x=0; x < camposTexto.length; x++) {
	if (camposTexto[x].value == '' && camposTexto[x].type=='text'){
			alert("El campo " + camposTexto[x].name + " esta vacio y es OBLIGATORIO");
			var idcampo=camposTexto[x].id;
			document.getElementById("idcampo").focus();
			return false;
			location='';
    	}
   }
   return true;
}
			

			function mostrSucursal(){
			    var ajax = XMLHTTP();	
				ajax.open("POST","vistas/sucursales.php",true);
				ajax.onreadystatechange=function()
			
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			}


			 function mostrPromo(){
			    // var ajax = XMLHTTP();	
				ajax.open("POST","vistas/vist_promociones.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			 }

			 function mostrtabla11(){
			    // var ajax = XMLHTTP();	
				ajax.open("POST","vistas/baja2.php",true);
				ajax.onreadystatechange=function()
				{
				  if(ajax.readyState==4){
				  	var respuesta=ajax.responseText;
        			document.getElementById('contenido').innerHTML=respuesta;
				  }	
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				ajax.send();
			 }

			

			 
            	
            

