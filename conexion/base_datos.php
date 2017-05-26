<?php
class BaseDatos
{
	var $conex=0;
	var $bd;
	var $host;
	var $user;
	var $passw;
	var $result;	
	//function __construct($server="148.204.117.3",$base="datareport",$usuario="usr_datareport",$contras="proyecto2014rs") 
	function __construct($server="localhost",$base="dataReport",$usuario="root",$contras="")
	{
			$this->host=$server;
			$this->bd=$base;
			$this->user=$usuario;
			$this->passw=$contras;
	}		
	function conectar($server,$base,$usuario,$contras)
	{		
		if($server !="")$this->host=$server;
	 	if($base !="") $this->bd=$base;
		if($usuario !="")$this->user=$usuario;
		if($contras !="") $this->passw=$contras;			 
		$this->conex= mysql_connect($this->host,$this->user,$this->passw);			 
		if(!$this->conex)
		{
			 echo "error"; 			
			return 0;
		}
        mysql_select_db($this->bd,$this->conex);          				
		return $this->conex;
	}
	
	function consulta($sql)
	{		
		$this->result=mysql_query($sql,$this->conex);
		return $this->result;
	}
	function consulta2($sql)
	{		 try{
			 		$this->result=mysql_query($sql,$this->conex);
					if(!$this->result)
					{    echo "<br>Error.....".$this->result->getCause();
						 throw new Exception("error en la consulta");					 	
				    }			
				}
				catch (Exception $e)
				{
					echo "No hay registros..." . $e->getMessage();
				}
					return $this->result;
	}
	function fetchall()	
	{
			$arreglo=mysql_fetch_all($this->result);
			return $arreglo;
	}

	function numrows()
	{
	    
		$numf=mysql_num_rows($this->result);
		return $numf;
	}

	function numfields()  //retorna total de columnas de la consulta sql
	{
		$totcol = mysql_num_fields($this->result);
		return $totcol;
	}

	function cerrarConexion()
	{	
		mysql_close($this->conex);

	}
	
	
	function fieldname($offset) //guarda el nombre del campo 
	{
		$field = mysql_field_name($this->result, $offset);
		return $field;
	}
	
	
	function fetchObject()
	{
		$fila= mysql_fetch_object($this->result);
		return $fila;
	}
	
	function fetchRow() // extrae el primer registro que trae result
    // y lo almacena en fila
	{
		$fila= mysql_fetch_row($this->result);
		return $fila;
	}
	
	function fetchArray()
	{
		$fila = mysql_fetch_array($this->result);
		return $fila;
	}
	
	function begintransaction() 
	{
	
		$this->consulta('START TRANSACTION');
	}
	function commit() 
	{
	$this->consulta('COMMIT');
	}
	
	function rollback() 
	{
		$this->consulta('ROLLBACK');
	}
	
	function setsavepoint($savepointname)
	{
		$this->consulta("SAVEPOINT $savepointname");
	}
	
	function rollbacktosavepoint($savepointname)
	{
		$this->consulta("ROLLBACK TO SAVEPOINT $savepointname");
	}
	
    //Esta funcion presenta todos los registros
	function getResultAsTable() //forma la tabla de consulta de los registros en tiempo de ejecución
	{
		if ($this->numrows() > 0) 
		{
			$resultHTML = "<table border='0' id='tablalista1' class='celda'>\n<tr>\n"; //swe forma la tabla
			$fieldCount = $this->numfields();  //fieldcount obtiene el numero de campos
			for ($i=0; $i < $fieldCount; $i++)
			{
				$rowName = $this->fieldName($i);  //fieldname guarda el nombre del campo de la posicion 0, 1, etc.y retorna ese nombre
                $rowName= strtoupper($rowName);
				$resultHTML .= "<th>$rowName</th>";
			} 
			$resultHTML .= "</tr>\n";
			
			while ($row = $this->fetchRow())   //mientras existan registros en la consulta el ciclo mientras continua
            //lee el primer registro de fetchRow, para verificar que existen registros, concatena al $resultHTML
            //se hace otro for, baja y se empieza a concatenar, a formar las columnas
			{
				$resultHTML .= "<tr>\n";
				for ($i = 0; $i < $fieldCount; $i++)
				    $resultHTML .= "<td>".htmlentities($row[$i])."</td>"; //htmllentities es una funcion de php
                    //que adapta los valores de row en este caso como codigo apropiado de html, que sea como
                    //una entidad html
				    $resultHTML .= "</tr>\n";
			}			            
			$resultHTML .= "</table>";            
		}
		else 
		{
			$resultHTML = "<p>No Results Found</p>";
		}
		return $resultHTML; //esto se retorna en _Ajax2 del consultar.html
	}
    
    //Esta funcion presenta todos los registros pero de 5 en 5
	function getResultAsTableParties() 
	{
		if ($this->numrows() > 0) 
		{
			$resultHTML = "<table border='0'>\n<tr>\n";
			$fieldCount = $this->numfields();
			for ($i=0; $i < $fieldCount; $i++)
			{
				$rowName = $this->fieldName($i);
				$resultHTML .= "<th>$rowName</th>";
			} 
			$resultHTML .= "</tr>\n";
			
            
			while ($row = $this->fetchRow())
			{
				$resultHTML .= "<tr>\n";
				for ($i = 0; $i < $fieldCount; $i++)
				$resultHTML .= "<td>".htmlentities($row[$i])."</td>";
				$resultHTML .= "</tr>\n";
			}
			
			$resultHTML .= "</table>";
		}
		else 
		{
			$resultHTML = "<p>No Results Found</p>";
		}
		return $resultHTML;
	}			
}
?>