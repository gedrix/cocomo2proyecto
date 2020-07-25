<?php 
	class Proceso
	{
		public $total =0;
		
		/******* funcion para leer archivos
			guias: https://www.php.net/manual/es/ref.dir.php
					https://desarrolloweb.com/articulos/listar-directorios-subdirectorios-php.html
		******/
		public function leerArchivos($directorio)
		{	
			global $total;
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
							
		                	self::leerArchivos($directorio."/".$elemento);
		                	//llamo al mismo metodo con la nueva ruta para leer los archivos
		            	}
		            	else // Si es un fichero
		            	{
			                // Muestro el fichero			             
		            		//echo "</br>"."archivo"."&nbsp".$elemento;
		            		$validacion=  self::validarExtension($elemento);
		            		if ($validacion != "extension_no_valida") 
		            		{
		            			$total += self::contadorLinea($validacion, $directorio);
		            		}
		            		
		          		}
					}	
				}
			
			}else{
				echo "Ruta no valida";
			}
			return $total;		
		}

		/**Se va a leer cada elemento para verificar si pertenete 
		a la extencion tipo java, php, o node
		guia: https://www.php.net/manual/es/splfileinfo.getextension.php*/

		public  function validarExtension($elemento)
		{
			 $extension = strtolower(pathinfo($elemento,PATHINFO_EXTENSION)); //obtengo la extension del elemeto
			 $valid_extensions = array('php', 'java','js'); //array de extensiones validas
			if (in_array($extension, $valid_extensions)) 
			{
				return $elemento;		               
			}
			else{
				return "extension_no_valida";
			}
		}

		/*esta funcion permite contar las lineas de un archivo
		guia: https://unipython.com/leer-el-contenido-de-un-archivo-en-php/
		https://www.php.net/manual/es/function.ctype-space.php
		*/
		public function contadorLinea($elemento, $directorio)
		{
			$cont =0;
			$coment =0;
			$comm1 = "/*";
			$comm2 = "*/";
			$comTotal = 0;
			$lineasC=0;
			$banC = false;
			$archivo = fopen($directorio."/".$elemento, "r");

			// Recorremos todas las lineas del archivo
			while(!feof($archivo))
			{

				$traer = fgets($archivo);// Leyendo una linea 

				if (!ctype_space($traer)) //ctype_space Chequear posibles caracteres de espacio en blanco
				{
					$trimmed = trim($traer); //elimino espacios en blanco al inicio y final de la cadena
					if (substr($trimmed, 0,1) != "") {
						$posicion_cadena = substr($trimmed, 0,2); //con esta cadena voy a tomar en cuenta las 2 primeras posicions para omitir el //
						$posicion_cadena2 = substr($trimmed, 0,1); //con esta cadena voy a omitir el #
						$tzt = strstr($trimmed, $comm1); //encuentra /*
						$txt = strstr($trimmed, $comm2); //encuentra */
						if ($tzt != ""){
							//$coment++;
							$banC = true;
						}else if ($txt != ""){
							$coment++;
							$comTotal += $coment + $lineasC;
							$coment=0;
							$lineasC=0;
							$banC = false;
						}
						if ($posicion_cadena != "//" ) {
							if ($posicion_cadena2 != "#") {
								$cont++;
								if($banC == true){
									$lineasC += 1;
								}
							}
						}
					}
					
				}
			}
			fclose($archivo); // Cerrando el archivo
			return $cont - $comTotal;	
		}
					
	}

 ?>