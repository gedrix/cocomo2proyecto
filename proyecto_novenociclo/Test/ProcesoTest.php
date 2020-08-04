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
    public function testEsfuerzoAplicado() {
    	
    	$proceso = new proceso();

    	$this->assertEquals($proceso->esfuerzoAplicado("","","",""), 'no se puede resolver');
    }
}


 ?>