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
<html>
<head>
    <title></title>
</head>
<!--
        Bloque de codigo HTML5 para crear la visualización de las variables tratadas en el bloque de codigo php, 
        que serán impresas en el reporte 
 -->
<body>
<center><img src="cocomo.png" width="100%" height="30%"></center>

        
    <h3>Datos informativos del proyecto:</h3>
<p>Los valores estimados son  correspondientes al proyecto alojado en la ruta: <?php echo $valores[0] ?></p>
    <table>
        <tr>
            <th >TIPO DE PROYECTO</th><td><?php echo $valores[1] ?></td> </tr>
          <tr>   <th >PAGO MENSUAL</th><td><?php echo $valores[2] ?></td> </tr>
             <tr><th >EAF</th><td><?php echo $valores[3] ?></td>   </tr>
             <tr><th >IMPREVISTOS</th><td><?php echo $valores[4] ?></td>   </tr>
       

    </table>

        <div class="row">
            <div class="col-6">
                <h3 class="titulos">VALORES ESTIMADOS</h3>
                <p>Estos valores son los estimados por el Cocomo II, los mismos no toman en cuenta los posibles valores de holgura o valores de imprevistos necesarios para que se acerquen a la realidad.</p>
                <table class="table">
                    <tr>
                    <td scope="col">TOTAL LÍNEAS DE CÓDIGO</td>
                    <td><?php echo $valores[5] ?></td>
                    </tr>
                    <tr>
                    <td scope="col">ESFUERZO PERSONA</td>
                    <td><?php echo $valores[6] ?></td>
                    </tr>
                    <tr>
                    <td scope="col">TIEMPO DE DESARROLLO</td>
                    <td><?php echo $valores[7]." semanas"?></td>
                    </tr>
                    <tr>
                    <td scope="col">PERSONAS REQUERIDAS</td>
                    <td><?php echo $valores[9]." personas"?></td>
                    </tr>
                    <tr>
                    <td scope="col">TOTAL GASTOS</td>
                    <td><?php echo $valores[10]?></td>
                    </tr>
                </table>
            </div>
 
            <div class="col-6">
                <h3 class="titulos">VALORES TOTALES</h3>
                <p>Estos valores son calculados tomando en cuenta un 25% más en el tiempo de desarrollo y un 10% más en el valor de desarrollo sumado al valor de posibles imprevistos</p> 
                <table class="table">
                    <tr>
                    <td scope="col">TOTAL LÍNEAS DE CÓDIGO</td>
                    <td><?php echo $valores[5] ?></td>
                    </tr>
                    <tr>
                    <td scope="col">ESFUERZO PERSONA</td>
                    <td><?php echo $valores[6] ?></td>
                    </tr>
                    <tr>
                    <td scope="col">TIEMPO DE DESARROLLO</td>
                    <td><?php echo $valores[8]." semanas"?></td>
                    </tr>
                    <tr>
                    <td scope="col">PERSONAS REQUERIDAS</td>
                    <td><?php echo $valores[9]." personas"?></td>
                    </tr>
                    <tr>
                    <td scope="col">TOTAL GASTOS</td>
                    <td><?php echo $valores[11]?></td>
                    </tr>
                </table>
            </div>

        </div>
        
    

    <script src="js/bootstrap.min.js"></script>
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