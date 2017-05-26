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
			function mostrVistEmpl(){
				//alert('sii');
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
			
			function mostrAltas(){
			    var ajax = XMLHTTP();	
				ajax.open("POST","../vistas/altas.php",true);
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
				// alert(turno);
				if (turno!="Seleccionar") {
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
				else
					alert("Seleccone un turno");
			}
			function mostrtabla9(){
			    var ajax = XMLHTTP();	
				ajax.open("POST","vistas/modifica.php",true);
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


			 function mostrtabla10(){
			    // var ajax = XMLHTTP();	
				ajax.open("POST","vistas/alta2.php",true);
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