<?php 
	
	//function cargarArchivo($ruta){ 
  	//return $ruta; 
	if ($_POST['directorio'] != null) {
		$directorio = $_POST['directorio'];
		leerArchivos($directorio);
		
	}else{
		echo "envie alguna ruta valida";
	}
	

		/******* funcion para leer archivos******/
	function leerArchivos($directorio){
		   
		if (is_dir($directorio)) 
		{
			$dir = opendir($directorio);
			while ($elemento = readdir($dir))
			{
				if( $elemento != "." && $elemento != "..")
				{
					if( is_dir($directorio."/".$elemento))
					{
	                // Muestro la carpeta
	                echo "<p><b>CARPETA: ". $elemento ."</b></p>";
	                leerArchivos($directorio."/".$elemento);
	            	
	            	} 
	            		else // Si es un fichero
	            		{
		                // Muestro el fichero
		                echo "<br />". $elemento;
		            	}
				}
			}
			closedir($dir);
		}else{
			echo "Ruta no valida";
		}
	}
 ?>