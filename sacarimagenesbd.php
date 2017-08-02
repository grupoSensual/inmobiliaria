<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="submit" name="mostrarbtd">
		<input type="submit" name="mostrartodo">
	</form>

	<?php
		$servername='localhost';
		$username='root';
		$password='';
		$dbname = 'bdtucasa';

		// $conn = new PDO("mysql:host=$host; dbname=".$dbname, $dbuser, $dbpss);
  		//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$conn = new PDO("mysql:host=$servername;dbname=".$dbname, $username, $password);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$id=18;
		//este es para sacar solo las fotos de una id inmueble
		/*if(isset($_POST["mostrarbtd"])){
			try {
			    $stmt = $conn->prepare("SELECT * FROM tbimagenes WHERE idinmueble=$id"); 
			    $stmt->execute();

			    // set the resulting array to associative
			    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			    $imagen=$stmt->FetchAll();
			    var_dump($imagen);

			    for($i=0;$i<count($imagen);$i++){
			    	echo "<img class='img' src=" . $imagen[$i]['imagen'] . ">";
			    }
				    
			}catch(PDOException $e) {
				    echo "Error: " . $e->getMessage();
			}
		}*/	

		
		if(isset($_POST["mostrartodo"])){

			try {
				//este vale para sacar el inner join de las fotos con el inmueble para el menu principal
			    /*$stmt = $conn->prepare("SELECT inmu.idinmueble,inmu.zona, inmu.modalidad ,inmu.banios, inmu.habitaciones, inmu.superficie, inmu.precio, imag.imagen FROM tbinmuebles as inmu INNER JOIN tbimagenes as imag ON inmu.idinmueble=imag.idinmueble WHERE inmu.modalidad='Alquiler' GROUP BY inmu.idinmueble LIMIT 10"); 
  			    $stmt->execute();*/

  			    //nombre y apellidos de la persona de una propiedad
  			    /*$stmt = $conn->prepare(" SELECT i.idinmueble, c.nombre, c.apellidos FROM tbclientes as c INNER JOIN tbinmuebles as i ON i.idcliente=c.idclientes WHERE i.idinmueble=2"); 
  			    $stmt->execute();*/

  			    //no aparezca opcion de mandar correo al usuario de la misma propiedad
  			    /*$stmt = $conn->prepare("SELECT i.idinmueble FROM tbclientes as c INNER JOIN tbinmuebles as i ON i.idcliente=c.idclientes where c.idclientes=1"); 
  			    $stmt->execute();*/

			    //Sacar zona, nombre, apellidos, etc.. de las personas interesadas en tus propiedades
			    /*$stmt = $conn->prepare("SELECT i.zona, c.idclientes, c.nombre, c.apellidos, c.email, s.fecha, s.comentarios, s.telefono FROM tbsolicitudes as s
			    INNER JOIN tbclientes as c ON c.idclientes=s.idcliente
			    INNER JOIN tbinmuebles as i ON i.idinmueble=s.idinmueble WHERE i.idcliente=1 GROUP BY i.idinmueble"); */


			    //Sacar informacion y mensaje enviado por la propiedad interesada
			    /*$stmt = $conn->prepare("SELECT c.nombre, c.apellidos, c.email, i.idinmueble, i.zona, i.precio, i.modalidad, s.fecha, s.comentarios FROM tbsolicitudes as s
			    INNER JOIN tbinmuebles as i ON i.idinmueble=s.idinmueble 
			    INNER JOIN tbclientes as c ON c.idclientes=i.idcliente WHERE s.idcliente=1");*/

				//Sacar todos los inmuebles en venta de un usuario
				/*$stmt = $conn->prepare("SELECT i.idinmueble, i.zona, i.modalidad ,i.banios, i.habitaciones, i.superficie, i.precio, img.imagen FROM tbinmuebles as i INNER JOIN tbimagenes as img ON i.idinmueble=img.idinmueble WHERE i.idcliente=1 AND i.modalidad='Alquiler' GROUP BY i.idinmueble"); */




				//Filtro index

				//Zonas distintas paracargarlas en option
				$stmt = $conn->prepare("SELECT DISTINCT zona FROM tbinmuebles");



				/*$stmt = $conn->prepare("SELECT i.idinmueble, i.zona, i.modalidad ,i.banios, i.habitaciones, i.superficie, i.precio, img.imagen FROM tbinmuebles as i INNER JOIN tbimagenes as img ON i.idinmueble=img.idinmueble WHERE i.idcliente=1 AND i.modalidad='Alquiler' GROUP BY i.idinmueble");*/

  			    $stmt->execute();

  			    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			    $datos=$stmt->FetchAll();
			    var_dump($datos); 

 

			    //este trocito representa las imagenes del codigo de arriba 
			    // for($i=0;$i<count($imagen);$i++){
			    // 	echo "<img class='img' src=" . $imagen[$i]['imagen'] . ">";
			    // }
					    
			}catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
		}			

		$conn = null;
	?>
</body>
</html>

