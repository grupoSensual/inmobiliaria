<?php
	$id=$_SESSION['idUser'];

try {
    $stmt = $conn->prepare("SELECT * FROM tbparametros"); 
	$stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result= $stmt->fetchAll()[0];
    $imagenespermi=$result['numimgpermi']*1;

    //Sacamos nombre del usuario para ponerlo en la bienvenida
    $stmt = $conn->prepare("SELECT nombre FROM tbclientes WHERE idclientes=$id"); 
	$stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $usernombre= $stmt->fetchAll()[0];
    
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if(isset($_POST["submit"])){
	$habitaciones=test_input($_POST["habitaciones"]);
	$banios=test_input($_POST["banos"]);
	$precio=test_input($_POST["precio"]);
	$zona=test_input($_POST["zona"]);
	$superficie=test_input($_POST["metros"]);
	$descripcion=test_input($_POST["descrip"]);
	$antiguedad=test_input($_POST['age']);
	$modalidad=test_input($_POST['modo']);
	
	//aqui subo la foto
	$target_dir = "uploads/";
	
	if (!file_exists($target_dir)) {
	    mkdir($target_dir, 0777, true);
	}

	$uploadOk = 1;
	
	if($habitaciones=="" || $banios=="" || $precio=="" || $zona=="" || $superficie==""|| $descripcion=="" ||$antiguedad=="" || $modalidad==""){
		echo "Debe rellenar todos los campos";

	}else{
			
		if(count($_FILES["fileToUpload"]["name"])>$imagenespermi){
			echo "Maximo de imagenes permitidas =" . $imagenespermi;
		
		}else{

			try {
			    	  
			   	$conn->beginTransaction();
			    $stmt = $conn->prepare("INSERT INTO tbinmuebles(idcliente, habitaciones, banios, precio, zona, superficie, antiguedad, descripcion, modalidad)
    			VALUES (:id, :habitaciones, :banios, :precio, :zona, :superficie, :antiguedad, :descripcion, :modalidad)");//comillas con texto no con fecha ni numero
    			$stmt->bindParam(':id', $id);
    			$stmt->bindParam(':habitaciones', $habitaciones);
    			$stmt->bindParam(':banios', $banios);
    			$stmt->bindParam(':precio', $precio);
    			$stmt->bindParam(':zona', $zona);
    			$stmt->bindParam(':superficie', $superficie);
    			$stmt->bindParam(':antiguedad', $antiguedad);
    			$stmt->bindParam(':descripcion', $descripcion);
    			$stmt->bindParam(':modalidad', $modalidad);

    			$stmt->execute();
    			$last_id = $conn->lastInsertId();
    			 
				for($u=0;$u<count($_FILES["fileToUpload"]["name"]);$u++){

					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$u]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$target_file = $target_dir . $last_id .basename($_FILES["fileToUpload"]["name"][$u]);

					$mensajevistobueno="New record created successfully";

					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$u]);
					
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
					
					// Check if file already exists
					if (file_exists($target_file)) {
		   				 echo "Sorry, file already exists please change the name.";
		   				 $uploadOk = 0;
					}

					// Check file size
					if ($_FILES["fileToUpload"]["size"][$u] > 3000000){
		  				  echo "Sorry, your file is too large.";
		   				 $uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ){
		    			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    			$uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
		   				 echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
					} else {

		    			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$u], $target_file)) {
		       				echo "The file ". basename( $_FILES["fileToUpload"]["name"][$u]). " has been uploaded.";
		   				} else {
		       				echo "Sorry, there was an error uploading your file.";
		   				}
					}
						
					$sql = "INSERT INTO tbimagenes (idinmueble, imagen) VALUES ('$last_id' , '$target_file')";
					$conn->exec($sql);
		    	}
							
				$conn->commit();
			
			}catch(PDOException $e){
				$conn->rollback();
				echo $sql . "<br>" . $e->getMessage();
			}
		
			$conn = null;
			header("location: cuenta.php");
		}	
	}							
}					
?>