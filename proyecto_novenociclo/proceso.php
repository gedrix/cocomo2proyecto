<?php 
	class Proceso
	{
		private $total =0;
		/**
			* @Author Gerardo, Ricardo, Saman
		*/


		/**
			* @brief funcion para leer archivos
			* guias: https://www.php.net/manual/es/ref.dir.php
			* https://desarrolloweb.com/articulos/listar-directorios-subdirectorios-php.html
			* la función se encarga de leer todos los directorios de una ruta en especifico
			* y tambien los subdirectorios que se encuentren, esta funcion trabaja
			* con otras 2 fuciones para poder validar la extension y contar las lineas de código
			* @param directorio
			* @return $total
		*/
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
		            		$validacion=  self::validarExtension($elemento);
		            		if ($validacion != "extension_no_valida") 
		            		{
								//echo "</br>"."archivo"."&nbsp". $validacion ."&nbsp"."numero lineas"."&nbsp".contadorLinea($validacion, $directorio);
								
								$total += self::contadorLinea($validacion, $directorio);

		            		}
		          		}
					}	
				}
			
			}else{
				return "Ruta no valida";
			}
			if ($total >= 0) {
				
				return $total;	
			}else{
				header("Location: index.php");
			}
				
		}
		

		/**
		 * @brief Se va a leer cada elemento para verificar si pertenete 
		*a la extencion tipo java, php, o node
		*Esta función recibe un elemento en especifico que envia 
		*la funcion leerArchivos, en caso que la extension no pertenezca
		*retorna extension_no_valida
		*guia: https://www.php.net/manual/es/splfileinfo.getextension.php
		* @param elemento
		* @return $elemento, o "extension_no_valida"
		*/

		private  function validarExtension($elemento)
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

		/**
		* @brief esta funcion permite contar las lineas de un archivo
		*omitiendo los comentarios del programador, y los espacios en blanco
		*ese metodo retorna el totl de lineas de código
		*guia: https://unipython.com/leer-el-contenido-de-un-archivo-en-php/
		*https://www.php.net/manual/es/function.ctype-space.php
		* @param elemento, directorio
		* @return $cont, o "no se puede resolver"
		*/
		public function contadorLinea($elemento, $directorio)
		{
			if ($elemento != "" && $directorio != "") {
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
			}else{
				return "no se puede resolver";
			}

			
		}
							
		/*******************ESFUERZO APLICADO********************/
		/**
		 * @brief Esta función aplicará el cocomo 2, utilizando la formula 
		 *	E = EAF * a (SLOC)^b
		 *	donde estos valores son enviados desde el cargar-archivo.php
		 *	cabe recalcar que estos valores estan definidos en una tabla en especifico
		 *	se retorna el resultado, caso contrario con un string 'no se puede resolver'
		* @param $eaf, $valor_a, $valor_b, $linea_codigo
		* @return $operacion_multiplicacion, o "no se puede resolver"
		 */
		public function esfuerzoAplicado($eaf, $valor_a, $valor_b, $linea_codigo)
		{
			if ($eaf != "" && $valor_a!= "" && $valor_b!= "" && $linea_codigo!= "" ) {
				if (is_numeric($eaf) && is_numeric($valor_a)  &&  is_numeric($valor_b)  && is_numeric($linea_codigo) ) {
					if ($eaf >0 && $valor_a>0 && $valor_b>0 && $linea_codigo>0) {
						$linea_codigo= ($linea_codigo/1000);
						$operacion_potencia = pow ($linea_codigo , $valor_b );
						$operacion_multiplicacion = $eaf * $valor_a * $operacion_potencia;
				
						if ($operacion_multiplicacion >0) {
							return round ($operacion_multiplicacion, 2);
						}else{
						return "no se puede resolver";
						}
					}else{
						return "no se puede resolver";
					}
				}else{
					return "no se puede resolver";
				}				
			}else{
				return "no se puede resolver";
			}
			
		}

		/*******************ESFUERZO DESARROLLO*********************/
		/**
		* @brief Esta función aplicará el cocomo 2, utilizando la formula 
	    *    D = c (E)^d
		*	estos valores van a ser enviados en el cargar-archivo
		*	cabe recalcar que estos valores estan definidos en una tabla en especifico
		*	se retorna el resultado, caso contrario con un string 'no se puede resolver'
		* @param $valor_c, $total_esfuerzo, $valor_d
		* @return $operacion_multiplicacion, o "no se puede resolver"
		*/
		public function tiempoProyecto($valor_c, $total_esfuerzo, $valor_d)
		{
			if ($valor_c  != "" && $total_esfuerzo  != "" && $valor_d != "" ) {
				$operacion_potencia = pow($total_esfuerzo, $valor_d );
				$operacion_multiplicacion = $valor_c * $operacion_potencia;
				return round ($operacion_multiplicacion, 1);
			}else{
				return "no se puede resolver";
			}
			
		}

		/**
		* @brief Esta función aplicará el cocomo 2, utilizando la formula 
		*	D = c (E)^d, pero a ese resultado se le sacará el 25% con la finalidad
		*	de tener un tiempo mas preciso a la realidad
		* @param $valor_c, $total_esfuerzo, $valor_d
		* @return $tiempo_total, o "no se puede resolver"
		*/
		public function tiempoProyecto25($valor_c, $total_esfuerzo, $valor_d)
		{
			if ($valor_c  != "" && $total_esfuerzo  != "" && $valor_d != "") 
			{
				if (is_numeric($valor_c) && is_numeric($total_esfuerzo) && is_numeric($total_esfuerzo)) 
				{
					if ($valor_c>0 && $total_esfuerzo>0  && $valor_d>0 ) 
					{
						$operacion_potencia = pow($total_esfuerzo, $valor_d );
						$operacion_multiplicacion = $valor_c * $operacion_potencia;
						$tiempo_olgura = $operacion_multiplicacion * 0.25;
						$tiempo_total = $operacion_multiplicacion + $tiempo_olgura;
						return round ($tiempo_total, 1);
					}else{
						return "no se puede resolver";
					}
				}else{
					return "no se puede resolver";
				}
			}else{
				return "no se puede resolver";
			}
			
		}

		/*******************PERSONAS*********************/
		/**
		* @brief Esta función aplicará el cocomo 2, utilizando la formula 
		*	P = E/D; permiento obtener el personal necesario para el trabajo
		*	en esta función se redondeará con la finalidad detener un personal mas preciso
		* @param $total_esfuerzo,  $tiempo_desarrollo
		* @return $operacion, o "no se puede resolver"
		 */
		public function personalNecesario($total_esfuerzo,  $tiempo_desarrollo)
		{
			if ($total_esfuerzo != "" &&   $tiempo_desarrollo != "" ) {

				$operacion = $total_esfuerzo / $tiempo_desarrollo;
				if ($operacion > 0 && $operacion < 1.00) {
				return 1;
				}else{
				return round($operacion, 0);
				}
			
			}else{
				return "no se puede resolver";
			}
			
		}
		
		/*******************GASTOS PERSONAS*********************/
		/**
		* @brief	para el gasto de desarrollo se realizar a divirir el costo de desarrollo mensual
		*	para poder se multiplicado por el costo de desarrollo semanal, y ese resultado
		*	será evaluado por la cantidad de personal que hay, posterior a ese resultado
		*	se aumental el 10% considerando un valor de olgura; para esto se conidera que el tiempo
		*	de desarrollo ya tiene aplicado el 25
		* @param $personal, $tiempo_desarrollo, $costo_desarrollo, $imprevistos
		* @return $total, o "no se puede resolver"
		*/
		public function gastoDesarrollador( $personal, $tiempo_desarrollo, $costo_desarrollo, $imprevistos)
		{

			if ($personal != "" && $tiempo_desarrollo != "" && $costo_desarrollo!= "") {
				
				$costo_desarrollo_semanal = $costo_desarrollo /4;
				$costo_semanal = $costo_desarrollo_semanal * $tiempo_desarrollo;
				$costo_total = $costo_semanal * $personal;
				$valor_olgura = $costo_total * 0.10;
				$total = $costo_total + $valor_olgura + $imprevistos;
				
				return $total;
			}
			else{
				return "no se puede resolver";
			}
			
		}

		/**
		 * @brief	para el gasto de desarrollo se realizar a divirir el costo de desarrollo mensual
		 *	para poder ser multiplicado por el costo de desarrollo semanal, y ese resultado
		 *	será evaluado por la cantidad de personal que hay, posterior a ese resultado
		* @param $personal, $tiempo_desarrollo, $costo_desarroll
		* @return $costo_total, o "no se puede resolver"	
		*/
		public function gastosDesarrolladorEstimados ($personal, $tiempo_desarrollo, $costo_desarrollo){
			if ($personal != "" && $tiempo_desarrollo != "" && $costo_desarrollo!= "") {
				
				$costo_desarrollo_semanal = $costo_desarrollo /4;
				$costo_semanal = $costo_desarrollo_semanal * $tiempo_desarrollo;
				$costo_total = $costo_semanal * $personal;
								
				return $costo_total;
			}
			else{
				return "no se puede resolver";
			}
		}  
	}

 ?>