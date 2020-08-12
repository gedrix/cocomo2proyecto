<?php 
use PHPUnit\Framework\TestCase;

require_once('proceso.php');

class ProcesoTest extends TestCase
{
	
	//public function testCanInstatiate(){
    //    $animal = new proceso();
    //    $this->assertEquals($animal->esfuerzoAplicado(), 'Muuu');
    // }

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