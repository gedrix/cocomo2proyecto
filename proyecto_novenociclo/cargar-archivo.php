<?php 

	 require "proceso.php";
	 $proceso = new proceso;
	 //&& $_POST['pago'] %% $_POST['eaf']
	if ($_POST['directorio'] != null  && $_POST['opcion'] != null ) 
	{
		$directorio = $_POST['directorio'];
		$proyecto_soft = $_POST['opcion'] ;
		//echo leerArchivos($directorio);
		$costo_desarrollo = 500;
		$eaf = 0.94;
		
		switch ($proyecto_soft) {
			case 'a':
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				//echo $total_linea_codigo;
				$valor_a = 3.2;
				$valor_b = 1.05;
				$valor_c = 2.5;
				$valor_d = 0.38;
				$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
				$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
				$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
				$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_desarrollo,$costo_desarrollo);
				 echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
				 echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
				 echo "</br>"."personas requeridas  ". $personal;
				 echo "</br>"."gasto en programadores". $gastoProgramador;
				
			break;

			case 'b':
				
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				$valor_a = 3;
				$valor_b = 1.12;
				$valor_c = 2.5;
				$valor_d = 0.35;

				$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
				$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
				$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
				$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_desarrollo,$costo_desarrollo);
				 echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
				 echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
				 echo "</br>"."personas requeridas  ". $personal;
				 echo "</br>"."gasto en programadores". $gastoProgramador;

			break;

			case 'c':
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				$valor_a = 2.8;
				$valor_b = 1.20;
				$valor_c = 2.5;
				$valor_d = 0.32;
				$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
				$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
				$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
				$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_desarrollo,$costo_desarrollo);
				 echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
				 echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
				 echo "</br>"."personas requeridas  ". $personal;
				 echo "</br>"."gasto en programadores". $gastoProgramador;
			break;
			default:
				echo "ups";
				break;
		}
		
	}else{
		echo "LLENE LOS CAMPOS";
	}
	

		

	
 ?>