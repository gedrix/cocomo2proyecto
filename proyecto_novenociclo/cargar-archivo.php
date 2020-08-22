<?php 
	session_start();
	 require "proceso.php"; //se especifica que se requiere al archivo proceso
	 $proceso = new proceso; //se crea un objeto de la clase proceso
	 /*
		BLOQUE DE CÓDIGO PHP

		Al inicializar esta pagina, comprobamos que la data enviado desde el index.php sea diferente de null
		si es asi las almacenamos en variables
		
		$directorio = almacena la ruta del directorio a analizar
		$proyecto_soft = almacena el tipo de royecto
		$costo_desarrollo = almacena el valor del pago mensual a los desarrolladores
		$eaf = almacena el valor del eaf, enviado desde index.php
		$imprevistos = almacena el valor ingresado para los imprevistos

		En base al tipo de proyecto se aplican las formulas del COCOMO II con los valores correspondientes a cada tipo de proyecto.

		$total_esfuerzo =  almacena el valor resultante de la función esfuerzoAplicado($eaf, $valor_a, $valor_b, $total_linea_codigo);

		$tiempo_desarrollo =  almacena el valor resultante de la función tiempoProyecto($valor_c, $total_esfuerzo, $valor_d);
		
		$tiempo_total = almacena el valor resultante de la función tiempoProyecto25($valor_c, $total_esfuerzo, $valor_d);
		
		$personal =  almacena el valor resultante de la función personalNecesario($total_esfuerzo,  $tiempo_desarrollo);
		
		$gastoProgramador =  almacena el valor resultante de la función gastoDesarrollador($personal, $tiempo_total,$costo_desarrollo, $imprevistos);
		
		$gastoProgramadorEsti = almacena el valor resultante de la función gastosDesarrolladorEstimados($personal, $tiempo_desarrollo,$costo_desarrollo);

	 */
	if ($_POST['directorio'] != null  && $_POST['opcion'] != null && $_POST['pago'] != "" && $_POST['eaf'] != "" && $_POST['imprevistos'] != "") 
	{
		$directorio = $_POST['directorio'];
		$proyecto_soft = $_POST['opcion'] ;
		$costo_desarrollo = $_POST['pago'];
		$eaf = $_POST['eaf'];
		$imprevistos = $_POST['imprevistos'];
		switch ($proyecto_soft) {
			case 'a':
				$tipo_proyecto="Orgánico";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo >0) {
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
					$_SESSION["rutaValida"] = "true";
				}else{
					$_SESSION["rutaValida"] = "false";
					header("Location: index.php");
					
				}
			break;

			case 'b':
				$tipo_proyecto="Semi-Separado";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo  >0) {
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
					$_SESSION["rutaValida"] = "true";
				}else{
					$_SESSION["rutaValida"] = "false";
					header("Location: index.php");
				}
			break;

			case 'c':
				$tipo_proyecto="Integrales";
				$total_linea_codigo =  $proceso->leerArchivos($directorio);
				if ($total_linea_codigo  >0) {
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
					$_SESSION["rutaValida"] = "true";
				}else{
					$_SESSION["rutaValida"] = "false";
					header("Location: index.php");;
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
		
		//Función para retornar a index.php
		function Regresar()
		{
			//window.history.back();
			window.location = "index.php";
		}
	</script>
		
 </head>
	<!--
		Bloque de codigo HTML5 para crear la visualización de las variables tratadas en el bloque de codigo php
	-->
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