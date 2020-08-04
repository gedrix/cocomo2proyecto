<?php 

	 require "proceso.php";
	 $proceso = new proceso;
	 //&& $_POST['pago'] %% $_POST['eaf']
	 //echo $_POST['pago'];
	if ($_POST['directorio'] != null  && $_POST['opcion'] != null && $_POST['pago'] != "" && $_POST['eaf'] != "" && $_POST['imprevistos'] != "") 
	{
		$directorio = $_POST['directorio'];
		$proyecto_soft = $_POST['opcion'] ;
		//echo leerArchivos($directorio);
		$costo_desarrollo = $_POST['pago'];
		$eaf = $_POST['eaf'];
		//$tipo_proyecto="";
		$imprevistos = $_POST['imprevistos'];
		switch ($proyecto_soft) {
			case 'a':
				$tipo_proyecto="Organico";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo != "Ruta no valida") {
					//echo $total_linea_codigo;
					$valor_a = 3.2;
					$valor_b = 1.05;
					$valor_c = 2.5;
					$valor_d = 0.38;
					$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
					$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
					$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
					$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_desarrollo,$costo_desarrollo, $imprevistos);
					 //echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
					// echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
					// echo "</br>"."personas requeridas  ". $personal;
					// echo "</br>"."gasto en programadores". $gastoProgramador;
				}else{
					header("Location: index.php");
				}
			break;

			case 'b':
				$tipo_proyecto="Semi-Separado";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo != "Ruta no valida") {
					$valor_a = 3;
					$valor_b = 1.12;
					$valor_c = 2.5;
					$valor_d = 0.35;

					$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
					$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
					$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
					$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_desarrollo,$costo_desarrollo , $imprevistos);
					// echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
					// echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
					// echo "</br>"."personas requeridas  ". $personal;
					// echo "</br>"."gasto en programadores". $gastoProgramador;
				}else{
					header("Location: index.php");
				}
			break;

			case 'c':
				$tipo_proyecto="Integrales";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo != "Ruta no valida") {
					$valor_a = 2.8;
					$valor_b = 1.20;
					$valor_c = 2.5;
					$valor_d = 0.32;
					$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
					$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
					$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
					$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_desarrollo,$costo_desarrollo, $imprevistos);
					// echo "</br>"."esfuerzo persona  " .$total_esfuerzo;
					// echo "</br>"."tiempo de desarrollo  ". $tiempo_desarrollo;
					// echo "</br>"."personas requeridas  ". $personal;
					// echo "</br>"."gasto en programadores". $gastoProgramador;
				}else{
					header("Location: index.php");
				}
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
	<link rel="stylesheet" href="css/estilos.css"/>

	<script type="text/javascript">

		function Regresar()
		{
			//window.history.back();
			window.location = "index.php";
		}
	</script>
		
 </head>

 <body>
	<div class="container">
		<div class="row">
		<div class="col-6">
			<table class="table">
				<tr>
					<td scope="col">TIPO DE PROYECTO</td>
					<td><?php echo $tipo_proyecto ?></td>
				</tr>
				<tr>
					<td scope="col">PAGO MENSUAL</td>
					<td><?php echo ("$".$_POST['pago']) ?></td>
				</tr>
				<tr>
					<td scope="col">EAF</td>
					<td><?php echo $_POST['eaf'] ?></td>
				</tr>
				<tr>
					<td scope="col">IMPREVISTOS</td>
					<td><?php echo ("$".$_POST['imprevistos']) ?></td>
				</tr>
			</table>
		</div>
			<div class="col-6">
			<table class="table">
				<tr>
				<td scope="col">TOTAL LÍNEAS DE CÓDIGO</td>
				<td><?php echo $total_linea_codigo ?></td>
				</tr>
				<tr>
				<td scope="col">ESFUERZO PERSONA</td>
				<td><?php echo $total_esfuerzo ?></td>
				</tr>
				<tr>
				<td scope="col">TIEMPO DE DESARROLLO</td>
				<td><?php echo $tiempo_desarrollo?></td>
				</tr>
				<tr>
				<td scope="col">PERSONAS REQUERIDAS</td>
				<td><?php echo $personal?></td>
				</tr>
				<tr>
				<td scope="col">TOTAL GASTOS</td>
				<td><?php echo("$".$gastoProgramador)?></td>
				</tr>
			</table>
			</div>
			
		</div>
		<div class="row">
			<div class="col-8">
			<!--onclick='Regresar()'-->
				<button type="button" class="btn btn-success" onclick='Regresar()'>Volver a Calcular</button>
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