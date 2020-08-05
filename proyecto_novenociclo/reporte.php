<?php ob_start(); ?>
<h2>Reporte de Estimación</h2>
 <br>  

<h1 class="titulos">REPORTE COCOMO 2 - LINEAS DE CODIGO</h1>
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