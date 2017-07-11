<div class="divHead">
	<h2 class="head">ALTAS DE EMPLEADOS</h2>	  		
</div>
<div class="vistaContenido">
	<center>
	<FORM action='' method="post" id="formEmpl">
		<TABLE border=0>		
		<TR>
		<TD>Nombre</TD>
		<TD><INPUT type='text' name="nombre" id='nombreEmpl' size='30' maxlength='30'></TD>
		</TR>
		<TR>
		<TD>Sueldo</TD>
		<TD><INPUT type='text' name="sueldo" id='sueldoEmpl' size='20' maxlength='20' onkeypress="return validarNum(event)"></TD>
		</TR>
		<TR>
		<TD>Turno</TD>
		<TD><select id="turnoEmpl" id="">
				<option>Seleccionar</option>
				<option>Matutino</option>
				<option>Vespertino</option>
				<option>Mixto</option>			
				</select>
		</TD>
		</TR>
		</TD>
		</TR>
		</table>		
		<input type='button' name="" value='Aceptar' onclick="ejecAlta()">
		<input type='button' name="" value='Cancelar' onclick="mostrVistEmpl()">
	</FORM>
	</center>
</div>


	
