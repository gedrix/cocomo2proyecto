<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	//	include 'cargar-archivo.php';
		
	//	echo cargarArchivo("ruta") . "<br>";
	 ?>

	 <form action="cargar-archivo.php" method="post">
    	ruta del directorio: <input type="text" name="directorio" /><br />
    
    	<input type="submit" name="submit" value="Enviar" />
</form>
</body>
</html>