<?php 

	 require "proceso.php";
	 $proceso = new proceso;
	 
	if ($_POST['directorio'] != null  ) 
	{
		$directorio = $_POST['directorio'];
		$lineas= $proceso->	leerArchivos($directorio);
		
		echo $lineas;
	}else{
		echo "LLENE LOS CAMPOS";
	}
	
 ?>