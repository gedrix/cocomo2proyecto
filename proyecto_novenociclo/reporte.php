<?php ob_start();
    
    /*
        BLOQUE DE CÓDIGO PHP

        Al inicializar esta pagina, se recibe una variable v1 mediante el método get, que recibe una cadena con los resultados calculados
        en cargar archivo.php y se los divide en un array para ser presentados
        
        $cad = almacena la cadena de variables
        $valores = almacena el array de con los valores recibidos

     */
    $cad=$_GET['v1'];
    $valores = explode("-", $cad);
?>
<<html>
<head>
    <title></title>
</head>
<!--
        Bloque de codigo HTML5 para crear la visualización de las variables tratadas en el bloque de codigo php, 
        que serán impresas en el reporte 
 -->
<body>
<center><img src="cocomo.png" width="100%"></center>
<h2>Reporte de Estimación</h2>

<h3>Datos informativos del proyecto: </h3>

<div class="container">
  
        <div class="row">
        <div class="col-2">
            <table class="table">
                <tr>
                    <th scope="col">Ruta:</th>
                    <td align="right"><?php echo $valores[0] ?></td>
                </tr>
                 <tr>
                    <th scope="col">Líneas de código:   </th>
                    <td align="right"><?php echo $valores[5] ?></td>
                </tr>
                <tr>
                    <th scope="col">Tipo de Proyecto:</th>
                    <td align="right"><?php echo $valores[1] ?></td>
                </tr>
                <tr>
                    <th scope="col">Pago mensual al Recurso Humano:</th>
                    <td align="right"><?php echo "$".$valores[2]." dólares" ?></td>
                </tr>
                <tr>
                    <th scope="col">Atributos del proyecto y factor EAF:</th>
                    <td align="right"><?php echo $valores[3] ?></td>
                </tr>
                <tr>
                    <th scope="col">Valor asignado para imprevistos:</th>
                    <td align="right"><?php echo "$".$valores[4]." dólares"  ?></td>
                </tr>
            </table>
        </div>
<h3>Estimación de costos, personal y tiempo: </h3>

            <div class="col-6">
            <table class="table">
                <tr>
                <th scope="col">Esfuerzo persona:</th>
                <td align="right"><?php echo $valores[6] ?></td>
                </tr>
                <tr>
                <th scope="col">Tiempo estimado de desarrollo:</th>
                <td align="right"><?php echo $valores[7]." semanas"?></td>
                </tr>
                <tr>
                <th scope="col">Cantidad estimada de Recurso Humano requerido:</th>
                <td align="right"><?php echo $valores[8]." personas"?></td>
                </tr>
                <tr>
                <th scope="col">TOTAL de Gastos Estimados</th>
                <td align="right"><?php echo $valores[9] ?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
/*
        BLOQUE DE CÓDIGO PHP

        Al finalizar el tratamiento de variables, descrito en el bloque de html5 se procede a utilizar la herramienta DomPdf para generar el
        pdf del reporte.
        
*/
require_once 'dompdf/autoload.inc.php';//requiere el archivo autoload, que pertenece a la herramienta DomPdf
use Dompdf\Dompdf;//utiliza la herramienta
$dompdf = new DOMPDF();//crea un objeto de la clase
$dompdf->load_html(ob_get_clean());//carga la vista html5
$dompdf->render();//procesa la vista
$pdf = $dompdf->output();//guarda la salida
$filename = "reporte.pdf";//se asigna un nombre por defecto al archivo pdf
file_put_contents($filename, $pdf);
$dompdf->stream($filename);//envia a descargar el archivo con el nombre asignado
?>