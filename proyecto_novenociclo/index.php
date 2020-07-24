<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cocomo2</title>

	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilos.css"/>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
	<h1 class="titulos">COCOMO 2 - LINEAS DE CODIGO</h1>
	<div class="container-fluid">
		<div class="row fila">
			<div class="col-8">
			<table class="table">
				<thead>
					<tr class="tableTitle">
					<th scope="col">PROYECTO DE SOFTWARE</th>
					<th scope="col">Ab</th>
					<th scope="col">Bb</th>
					<th scope="col">Cb</th>
					<th scope="col">Db</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<th scope="row">Proyectos orgánicos (Organic projects): son proyectos por
					equipos reducidos con especificaciones del programa
					flexibles</th>
					<td>3,2</td>
					<td>1,05</td>
					<td>2,5</td>
					<td>0,38</td>
					</tr>
					<tr>
					<th scope="row">Proyectos semi-separados (Semi-detached projects): son proyectos por equipos de media envergadura con
					especificaciones de programa rígidas y flexibles.</th>
					<td>3,0</td>
					<td>1,12</td>
					<td>2,5</td>
					<td>0,35</td>
					</tr>
					<tr>
					<th scope="row">Proyectos integrales (Embedded projects): son proyectos con especificaciones de programa rígidas o la combinación de los dos anteriores.</th>
					<td>2,8</td>
					<td>1,20</td>
					<td>2,5</td>
					<td>0,32</td>
					</tr>
				</tbody>
			</table>
			</div>
			<!--CARGA DE ARCHIVOS-->
			<div class="col-4">
				<form action="cargar-archivo.php" method="post">
					<p>Seleccionar ruta del directorio</p>
					<input type="text" name="directorio" /><br/><br/>
					<p>Seleccionar tipo de Proyecto de Software</p>
					<select name="opcion">
						<option value="a" selected>Organicos</option> 
						<option value="b">Semiseparados</option>
						<option value="c">Integrales</option>
					</select>
					<br/><br/>
					<p>Pago mensual a programadores</p>
					<input type="number" name="pago" /><br/><br/>
					<p>EAF</p>
					<input type="text" name="eaf" /><br/><br/>
					<input type="submit" name="submit" value="Simular" />
				</form>
			</div>
		</div>
		<div class="row fila">
			<div class="col-8">
				<table class="table">
					<thead>
						<tr class="tableTitle">
						<th scope="col">Atributos</th>
						<th scope="col">Muy Bajo</th>
						<th scope="col">Bajo</th>
						<th scope="col">Normal</th>
						<th scope="col">Alto</th>
						<th scope="col">Muy Alto</th>
						<th scope="col">Extra Alto</th>
						<th scope="col">Recomendado</th>
						<th scope="col">Seleccionar</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="9" class="tableTitle">ATRIBUTOS DEL PRODUCTO</td>
						</tr>
						<tr>
							<th scope="row">Confiabilidad requerida del software</th>
							<td>0,75</td>
							<td>0,88</td>
							<td>1,00</td>
							<td>1,15</td>
							<td>1,40</td>
							<td></td>
							<td>1,40</td>
							<td>
							<select name="select">
								<option value="0.75">Muy Bajo</option> 
								<option value="0.88" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="1.15">Alto</option>
								<option value="1.40">Muy Alto</option>
								<option value="1.40">Recomendado</option>
							</select>
							</td>	
						</tr>
						<tr>
							<th scope="row">Tamaño de la base de datos</th>
							<td></td>
							<td>0,94</td>
							<td>1,00</td>
							<td>1,08</td>
							<td>1,16</td>
							<td></td>
							<td>1,08</td>
							<td>
							<select name="select">
								<option value="0.94" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="1.08">Alto</option>
								<option value="1.16">Muy Alto</option>
								<option value="1.08">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Complejidad del producto</th>
							<td>0,70</td>
							<td>0,85</td>
							<td>1,00</td>
							<td>1,15</td>
							<td>1,30</td>
							<td>1,65</td>
							<td>1,00</td>
							<td>
							<select name="select">
								<option value="0.70">Muy Bajo</option> 
								<option value="0.85" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="1.15">Alto</option>
								<option value="1.30">Muy Alto</option>
								<option value="1.65">Extra Alto</option>
								<option value="1.00">Recomendado</option>
							</select>
							</td>
						</tr>
						<!--2 parte de la tabla-->
						<tr>
							<td colspan="9" class="tableTitle">ATRIBUTOS DEL HARDWARE</td>
						</tr>
						<tr>
							<th scope="row">Limitaciones del rendimiento en tiempo real</th>
							<td></td>
							<td></td>
							<td>1,00</td>
							<td>1,11</td>
							<td>1,30</td>
							<td>1,66</td>
							<td>1,00</td>
							<td>
							<select name="select">
								<option value="1.00">Normal</option>
								<option value="1.11">Alto</option>
								<option value="1.30">Muy Alto</option>
								<option value="1.66">Extra Alto</option>
								<option value="1.00">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Limitaciones de memoria</th>
							<td></td>
							<td></td>
							<td>1,00</td>
							<td>1,06</td>
							<td>1,21</td>
							<td>1,56</td>
							<td>1,00</td>
							<td>
							<select name="select">
								<option value="1.00">Normal</option>
								<option value="1.06">Alto</option>
								<option value="1.21">Muy Alto</option>
								<option value="1.56">Extra Alto</option>
								<option value="1.00">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Volatilidad del entorno de la máquina virtual</th>
							<td></td>
							<td>0,87</td>
							<td>1,00</td>
							<td>1,15</td>
							<td>1,30</td>
							<td></td>
							<td>0,87</td>
							<td>
							<select name="select"> 
								<option value="0.87" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="1.15">Alto</option>
								<option value="1.30">Muy Alto</option>
								<option value="0.87">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Tiempo de recuperación requerido</th>
							<td></td>
							<td>0,87</td>
							<td>1,00</td>
							<td>1,07</td>
							<td>1,15</td>
							<td></td>
							<td>1,07</td>
							<td>
							<select name="select">
								<option value="0.87" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="1.07">Alto</option>
								<option value="1.15">Muy Alto</option>
								<option value="1.07">Recomendado</option>
							</select>
							</td>
						</tr>
						<!--Parte 3-->
						<tr>
							<td colspan="9" class="tableTitle">ATRIBUTOS DEL PERSONAL</td>
						</tr>
						<tr>
							<th scope="row">Capacidad de análisis</th>
							<td>1,46</td>
							<td>1,19</td>
							<td>1,00</td>
							<td>0,86</td>
							<td>0,71</td>
							<td></td>
							<td>0,86</td>
							<td>
							<select name="select">
								<option value="1.46">Muy Bajo</option> 
								<option value="1.19" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.86">Alto</option>
								<option value="0.71">Muy Alto</option>
								<option value="0.86">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Capacidad de ingeniería de software</th>
							<td>1,29</td>
							<td>1,13</td>
							<td>1,00</td>
							<td>0,91</td>
							<td>0,82</td>
							<td></td>
							<td>0,91</td>
							<td>
							<select name="select">
								<option value="1.29">Muy Bajo</option> 
								<option value="1.13" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.91">Alto</option>
								<option value="0.82">Muy Alto</option>
								<option value="0.91">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Experiencia en aplicaciones</th>
							<td>1,42</td>
							<td>1,17</td>
							<td>1,00</td>
							<td>0,86</td>
							<td>0,70</td>
							<td></td>
							<td>0,86</td>
							<td>
							<select name="select">
								<option value="1.42">Muy Bajo</option> 
								<option value="1.17" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.86">Alto</option>
								<option value="0.70">Muy Alto</option>
								<option value="0.86">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Experiencia en máquina virtual</th>
							<td>1,21</td>
							<td>1,10</td>
							<td>1,00</td>
							<td>0,95</td>
							<td></td>
							<td></td>
							<td>0,95</td>
							<td>
							<select name="select">
								<option value="1.21">Muy Bajo</option> 
								<option value="1.10" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.95">Alto</option>
								<option value="0.95">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Experiencia con el lenguaje de programación</th>
							<td>1,14</td>
							<td>1,07</td>
							<td>1,00</td>
							<td>0,95</td>
							<td></td>
							<td></td>
							<td>0,95</td>
							<td>
							<select name="select">
								<option value="1.14">Muy Bajo</option> 
								<option value="1.07" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.95">Alto</option>
								<option value="0.95">Recomendado</option>
							</select>
							</td>
						</tr>
						<!--Parte 4-->
						<tr>
							<td colspan="9" class="tableTitle">ATRIBUTOS DEL PROYECTO</td>
						</tr>
						<tr>
							<th scope="row">Uso de herramientas de software</th>
							<td>1,24</td>
							<td>1,10</td>
							<td>1,00</td>
							<td>0,91</td>
							<td>0,82</td>
							<td></td>
							<td>0,91</td>
							<td>
							<select name="select">
								<option value="1.24">Muy Bajo</option> 
								<option value="1.10" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.91">Alto</option>
								<option value="0.82">Muy Alto</option>
								<option value="0.91">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Aplicación de métodos ingenieriles en software</th>
							<td>1,24</td>
							<td>1,10</td>
							<td>1,00</td>
							<td>0,91</td>
							<td>0,83</td>
							<td></td>
							<td>1,00</td>
							<td>
							<select name="select">
								<option value="1.24">Muy Bajo</option> 
								<option value="1.10" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="0.91">Alto</option>
								<option value="0.83">Muy Alto</option>
								<option value="1.00">Recomendado</option>
							</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Planificación de desarrollo requerida</th>
							<td>1,23</td>
							<td>1,08</td>
							<td>1.00</td>
							<td>1.04</td>
							<td>1,10</td>
							<td></td>
							<td>1,04</td>
							<td>
							<select name="select">
								<option value="1.23">Muy Bajo</option> 
								<option value="1.08" selected>Bajo</option>
								<option value="1.00">Normal</option>
								<option value="1.04">Alto</option>
								<option value="1.10">Muy Alto</option>
								<option value="1.04">Recomendado</option>
							</select>
							</td>
						</tr>
						<!--Total-->
						<tr>
							<th scope="row">TOTAL</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>0,94</td>
							
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-4">
			</div>
		</div>
	</div>
	 
</body>
</html>