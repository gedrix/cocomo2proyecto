<?php 
	class Proceso
	{
		
		/******* funcion para leer archivos
			guias: https://www.php.net/manual/es/ref.dir.php
					https://desarrolloweb.com/articulos/listar-directorios-subdirectorios-php.html
		******/
		public function leerArchivos($directorio)
		{	
			if (is_dir($directorio)) 
			{
				$dir = opendir($directorio);
				while ($elemento = readdir($dir))
				{
					if( $elemento != "." && $elemento != "..")
					{
						// leo la carpeta y los archivos dentro de la carpeta
						if(is_dir($directorio."/".$elemento))
						{
							
		                	leerArchivos($directorio."/".$elemento); 
		                	//llamo al mismo metodo con la nueva ruta para leer los archivos
		            	}
		            	else // Si es un fichero
		            	{
			                // Muestro el fichero
		            		echo "</br>"."archivo"."&nbsp".$elemento;
		          		}
					}	
				}
			
			}else{
				echo "Ruta no valida";
			}		
		}
	}

 ?>