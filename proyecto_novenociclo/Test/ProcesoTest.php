<?php 
use PHPUnit\Framework\TestCase;

require_once('proceso.php');

class ProcesoTest extends TestCase
{
	
	//public function testCanInstatiate(){
    //    $animal = new proceso();
    //    $this->assertEquals($animal->esfuerzoAplicado(), 'Muuu');
    // }

    /***** PRUEBAS GERARDO RAMIREZ    *****/
    /***** FUNCION ESFUERZOAPLICAO    *****/
	//funcion esfuerzoAplicado, cuando todos los valores son nulos
    public function testEsfuerzoAplicadoVacio() {
        
        $proceso = new proceso();

        $this->assertEquals($proceso->esfuerzoAplicado("","","",""), 'no se puede resolver');
    }

    //funcion esfuerzoAplicado, cuando todos los valores string
    public function testEsfuerzoAplicadoVS() {
        
        $proceso = new proceso();

        $this->assertEquals($proceso->esfuerzoAplicado("a","b","c","d"), 'no se puede resolver');
    } 

    //funcion esfuerzoAplicado, cuando  todos los valores son int
     public function testEsfuerzoAplicadoVI() {

        $proceso = new proceso();
        $eaf = 0.94;
        $valor_a = 3;
        $valor_b =  1.12;
        $linea_codigo = 20000;
        $linea_codigos= ($linea_codigo/1000);
        $operacion_potencia = pow ($linea_codigos , $valor_b );
        $operacion_multiplicacion = $eaf * $valor_a * $operacion_potencia;
        $valor_redondeado = round ($operacion_multiplicacion, 2);
        $this->assertEquals($proceso->esfuerzoAplicado($eaf,$valor_a, $valor_b, $linea_codigo), $valor_redondeado);
    }
     //Cuando los valores que se envían a la función EsfuerzoAplicado son valores int negativos.
    public function testEsfuerzoAplicadoVN()
    {
         $proceso = new proceso();
        $eaf = 0.94;
        $valor_a = 3;
        $valor_b =  -1.12;
        $linea_codigo = 20000;
       
        $this->assertEquals($proceso->esfuerzoAplicado($eaf,$valor_a, $valor_b, $linea_codigo), 'no se puede resolver');
    } 

    /***** FUNCION CONTADORLINEA    ****/
    //funcion testContadorLinea, cuando todos los valores son vacios
    public function testContadorLineaVacio() {
        
        $proceso = new proceso();

        $this->assertEquals($proceso->contadorLinea("",""), 'no se puede resolver');
    }

    //funcion testContadorLinea, cuando todos los valores son correctos
    public function testContadorLineaVS() {
        
        $elemento ='prueba.php';
        $directorio='C:\Users\Gedo\Documents\ejerpython\pruebates';

            $cont =0;
            $coment =0;
          $comm1 = "/*";
            $comm2 = "*/";
            $comTotal = 0;
            $lineasC=0;
            $banC = false;
            
            $archivo = fopen('C:\Users\Gedo\Documents\ejerpython\pruebates/prueba.php',"r");
            while(!feof($archivo))
            {

                $traer = fgets($archivo);// Leyendo una linea 

                if (!ctype_space($traer)) //ctype_space Chequear posibles caracteres de espacio en blanco
                {
                    $trimmed = trim($traer); //elimino espacios en blanco al inicio y final de la cadena
                    if (substr($trimmed, 0,1) != "") {
                        $posicion_cadena = substr($trimmed, 0,2); //con esta cadena voy a tomar en cuenta las 2 primeras posicions para omitir el //
                        $posicion_cadena2 = substr($trimmed, 0,1); //con esta cadena voy a omitir el #
                        $tzt = strstr($trimmed, $comm1); //encuentra /*
                        $txt = strstr($trimmed, $comm2); //encuentra */
                            if ($tzt != ""){
                                
                                $banC = true;
                            }else if ($txt != ""){
                                $coment++;
                                $comTotal += $coment + $lineasC;
                                $coment=0;
                                $lineasC=0;
                                $banC = false;
                            }
                            if ($posicion_cadena != "//" ) {
                                if ($posicion_cadena2 != "#") {
                                    $cont++;
                                    if($banC == true){
                                        $lineasC += 1;
                                    }
                                }
                            }
                    }
                    
                }
            }
            fclose($archivo); // Cerrando el archivo
            $totalR = $cont - $comTotal;

        $proceso = new proceso();

        $this->assertEquals($proceso->contadorLinea($elemento, $directorio), $totalR);
    }

    //funcion tiempoProyecto25, cuando todos los valores son nulos
    public function testtiempoProyecto25Vacio() {
        
        $proceso = new proceso();

        $this->assertEquals($proceso->tiempoProyecto25("","",""), 'no se puede resolver');
    } 

    //funcion tiempoProyecto25, cuando todos los valores string
    public function testtiempoProyecto25VS() {
        
        $proceso = new proceso();

        $this->assertEquals($proceso->tiempoProyecto25("a","b","c"), 'no se puede resolver');
    } 

    //funcion tiempoProyecto25, cuando  todos los valores son int
    public function testtiempoProyecto25VI() {

        $proceso = new proceso();
        
        $valor_c = 2.5;
        $total_esfuerzo =  1.12;
        $valor_d = 0.38;
        $operacion_potencia = pow($total_esfuerzo, $valor_d );
        $operacion_multiplicacion = $valor_c * $operacion_potencia;
        $tiempo_olgura = $operacion_multiplicacion * 0.25;
        $tiempo_total = $operacion_multiplicacion + $tiempo_olgura;
        $totalTest = round($tiempo_total, 1);
        $this->assertEquals($proceso->tiempoProyecto25($valor_c,$total_esfuerzo, $valor_d), $totalTest);
    } 

    //Cuando los valores que se envían a la función tiempoProyecto25 son valores int negativos.
    public function testtiempoProyecto25VN()
    {
         $proceso = new proceso();
         $valor_c = 2.5;
         $total_esfuerzo =  -1.12;
         $valor_d = 0.38;
       
        $this->assertEquals($proceso->tiempoProyecto25($valor_c,$total_esfuerzo, $valor_d), 'no se puede resolver');
    } 
    /*--------------- RICARDO ESPARZA ----------------*/
    //funcion leerArchivos, cuando el valor de la ruta es vacio
    public function testLeerArchivosVacio(){
        $proceso = new proceso();
        $ruta = "";
        $this->assertEquals($proceso->leerArchivos($ruta),"Ruta no valida");
    }

    //funcion leerArchivos, cuando el valor de la ruta es un número
    public function testLeerArchivosNum(){
        $proceso = new proceso();
        $ruta = 10;
        $this->assertEquals($proceso->leerArchivos($ruta),"Ruta no valida");
    }

    //funcion leerArchivos, cuando el valor de la ruta es una ruta valida
    public function testLeerArchivosValido(){
        $proceso = new proceso();
        $ruta = "/home/rik/Documentos/project code/test";
        $total = 4;
        $this->assertEquals($proceso->leerArchivos($ruta),$total);
    }

    //funcion validarExtension, cuando el valor del elemento es vacio
    public function testValidarExtensionVacio(){
        $proceso = new proceso();
        $elemento = "";
        $this->assertEquals($proceso->validarExtension($elemento),"extension_no_valida");
    }

    //funcion validarExtension, cuando el valor del elemento es un número
    public function testValidarExtensionNum(){
        $proceso = new proceso();
        $elemento = 10;
        $this->assertEquals($proceso->validarExtension($elemento),"extension_no_valida");
    }

    //funcion validarExtension, cuando el valor del elemento es valido
    public function testValidarExtensionValido(){
        $proceso = new proceso();
        $elemento = 'test.php';
        $this->assertEquals($proceso->validarExtension($elemento),$elemento);
    }

    //funcion validarExtension, cuando el valor del elemento es una extension no valida
    public function testValidarExtensionNoValido(){
        $proceso = new proceso();
        $elemento = 'test.py';
        $this->assertEquals($proceso->validarExtension($elemento),"extension_no_valida");
    }

    //funcion gastoDesarrollador, cuando los valores son vacios
    public function testGastoDesarrolladorVacio(){
        $proceso = new proceso();
        $personal = "";
        $tiempo_desarrollo = "";
        $costo_desarrollo = "";
        $imprevistos = "";

        $total = "";

        $this->assertEquals($proceso->tiempoProyecto25("", "", ""),'no se puede resolver');
    }

    //funcion gastoDesarrollador, cuando los valores son validos
    public function testGastoDesarrolladorValido(){
        $proceso = new proceso();
        $personal = 1;
        $tiempo_desarrollo = 0.4;
        $costo_desarrollo = 200;
        $imprevistos = 1200;

        $costo_desarrollo_semanal = $costo_desarrollo /4;
        $costo_semanal = $costo_desarrollo_semanal * $tiempo_desarrollo;
        $costo_total = $costo_semanal * $personal;
        $valor_olgura = $costo_total * 0.10;
        $total = $costo_total + $valor_olgura + $imprevistos;

        $this->assertEquals($proceso->gastoDesarrollador($personal, $tiempo_desarrollo, $costo_desarrollo, $imprevistos),$total);
    }

    //funcion gastoDesarrollador, cuando no todos los valores son validos
    public function testGastoDesarrolladorValorText(){
        $proceso = new proceso();
        $personal = 1;
        $tiempo_desarrollo = 0.4;
        $costo_desarrollo = 200;
        $imprevistos = "ola";

        $this->assertEquals($proceso->gastoDesarrollador($personal, $tiempo_desarrollo, $costo_desarrollo, $imprevistos),"los valores no son numericos");
    }
}


 ?>