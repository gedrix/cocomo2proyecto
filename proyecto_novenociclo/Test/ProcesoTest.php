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
}


 ?>