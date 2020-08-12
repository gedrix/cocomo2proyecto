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
				$tipo_proyecto="Orgánico";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo != "Ruta no valida") {
					//echo $total_linea_codigo;
					$valor_a = 3.2;
					$valor_b = 1.05;
					$valor_c = 2.5;
					$valor_d = 0.38;
					$total_esfuerzo =  $proceso->esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);
					$tiempo_desarrollo =  $proceso->tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
					$tiempo_total = $proceso->tiempoProyecto25($valor_c, $total_esfuerzo, $valor_d);
					$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
					$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_total,$costo_desarrollo, $imprevistos);
					$gastoProgramadorEsti = $proceso->gastosDesarrolladorEstimados($personal, $tiempo_desarrollo,$costo_desarrollo);
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
					$tiempo_total = $proceso->tiempoProyecto25($valor_c, $total_esfuerzo, $valor_d);
					$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
					$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_total,$costo_desarrollo, $imprevistos);
					$gastoProgramadorEsti = $proceso->gastosDesarrolladorEstimados($personal, $tiempo_desarrollo,$costo_desarrollo);
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
					$tiempo_total = $proceso->tiempoProyecto25($valor_c, $total_esfuerzo, $valor_d);
					$personal =  $proceso->personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
					$gastoProgramador =  $proceso->gastoDesarrollador($personal, $tiempo_total,$costo_desarrollo, $imprevistos);
					$gastoProgramadorEsti = $proceso->gastosDesarrolladorEstimados($personal, $tiempo_desarrollo,$costo_desarrollo);
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
	
	$cadena = $directorio."-".$tipo_proyecto."-".$costo_desarrollo."-".$eaf."-".$imprevistos."-".$total_linea_codigo."-".$total_esfuerzo."-".$tiempo_desarrollo."-".$personal."-".$gastoProgramador;
	
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
 	<center><img src="cocomo.png" width="100%" height="20%"></center>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">TIPO DE PROYECTO</th>
							<th scope="col">PAGO MENSUAL</th>
							<th scope="col">EAF</th>
							<th scope="col">IMPREVISTOS</th>
					</thead>
					<tbody>
					</tbody>
						<tr>
							<td><?php echo $tipo_proyecto ?></td>
							<td><?php echo ("$".$_POST['pago']) ?></td>
							<td><?php echo $_POST['eaf'] ?></td>
							<td><?php echo ("$".$_POST['imprevistos']) ?></td>	
						</tr>
						
			</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-6">
				<h3 class="titulos">VALORES ESTIMADOS</h3>
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
					<td><?php echo $tiempo_desarrollo." semanas"?></td>
					</tr>
					<tr>
					<td scope="col">PERSONAS REQUERIDAS</td>
					<td><?php echo $personal." personas"?></td>
					</tr>
					<tr>
					<td scope="col">TOTAL GASTOS</td>
					<td><?php echo ("$".$gastoProgramadorEsti)?></td>
					</tr>
				</table>
			</div>

			<div class="col-6">
				<h3 class="titulos">VALORES TOTALES</h3>
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
					<td><?php echo $tiempo_total." semanas"?></td>
					</tr>
					<tr>
					<td scope="col">PERSONAS REQUERIDAS</td>
					<td><?php echo $personal." personas"?></td>
					</tr>
					<tr>
					<td scope="col">TOTAL GASTOS</td>
					<td><?php echo ("$".$gastoProgramador)?></td>
					</tr>
				</table>
			</div>
			
		</div>
		<div class="row">
			<div class="col-6">
				<hr>
				<p>Estos valores son los estimados por el Cocomo II, los mismos no toman en cuenta los posibles valores de olgura o valores de imprevistos necesarios para que se acerquen a la realidad.</p>
			</div>
			<div class="col-6">
				<hr>
				<p>Estos valores son calculados tomando en cuenta un 25% más en el tiempo de desarrollo y un 10% más en el valor de desarrollo sumado al valor de posibles imprevistos</p>
			</div>
		</div>
		<div class="row">
			<div class="col-8">
			<!--onclick='Regresar()'-->
				<button type="button" class="btn btn-success" onclick='Regresar()'>Volver a Calcular</button>
			</div>
			<br>
  			<div class="col-4">
  				<a class="btn btn-primary" href="reporte.php?v1=<?php echo $cadena;?>">Descargar PDF</a>
  			</div>

		</div>
		
	</div>
	


	<script src="js/bootstrap.min.js"></script>
 </body>
 </html>