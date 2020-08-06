<?php ob_start();
 
    $cad=$_GET['v1'];
    $valores = explode("-", $cad);
?>
<<html>
<head>
    <title></title>
</head>
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
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "reporte.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>