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
				 //echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
				// echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
				// echo "</br>"."personas requeridas  ". $personal;
				// echo "</br>"."gasto en programadores". $gastoProgramador;
				
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
				// echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
				// echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
				// echo "</br>"."personas requeridas  ". $personal;
				// echo "</br>"."gasto en programadores". $gastoProgramador;

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
				// echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
				// echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
				// echo "</br>"."personas requeridas  ". $personal;
				// echo "</br>"."gasto en programadores". $gastoProgramador;
			break;
			default:
				header("Location: index.php");
				
				break;
		}
		
	}else{
		header("Location: index.php");
	}
	
	
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">

	
	
 </head>

 <body>
	 	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	       <th scope="col">Total lineas código</th>
	      <th scope="col">esfuerzo persona</th>
	      <th scope="col">tiempo de desarrollo</th>
	      <th scope="col">Personas requeridas</th>
	      <th scope="col">Gastos total</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td><?php echo $total_linea_codigo ?></td>
	      <td><?php echo $total_esfuerzo ?></td>
	      <td><?php echo $tiempo_desarrollo?></td>
	      <td><?php echo $personal?></td>
	      <td><?php echo$gastoProgramador?></td>
	    </tr>
	    
	  </tbody>
	</table>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-8">
				<button type="button" class="btn btn-success">Volver a Calcular</button>
			</div>
			<br>
  			<div class="col-4">
  				<button type="button" class="btn btn-info">Generar Reporte</button>
  			</div>

		</div>
		
	</div>
	


	<script src="js/bootstrap.min.js"></script>
 </body>
 </html>