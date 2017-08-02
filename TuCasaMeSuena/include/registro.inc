<?php 
	require 'password.inc';
	global $smsRegister;

	if(isset($_POST["registro"])){
		$pass=test_input($_POST["pass"]);
		$mail=test_input($_POST["mail"]);		
		$nombre=test_input($_POST["nombre"]);
		$apellidos=test_input($_POST["apelli"]); 

		$hash=password_hash($pass, PASSWORD_BCRYPT, array("cost" => 10));

		$_SESSION["usuarioadmin"]=$mail;

		if($nombre=="" || $pass=="" || $mail==""){
			echo "Debe rellenar todos los campos";

		}else{
			try {

				$stmt = $conn->prepare("SELECT email FROM tbclientes WHERE email='$mail'");
				$stmt->execute();

				$stmt = $conn->prepare("SELECT  email FROM tbclientes WHERE email=:email");
				$stmt->bindParam(':email', $mail);
				$stmt->execute();

				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

				$result=$stmt->fetchAll();

				if(count($result)==1){
				   	echo "El usuario ya existe";
				
				}else{
					
					$stmt = $conn->prepare("INSERT INTO tbclientes (nombre, apellidos, email, contrasena)
						    VALUES (:nombre, :apellidos, :email, :hash)");
						 
					$stmt->bindParam(':nombre', $nombre);
					$stmt->bindParam(':apellidos', $apellidos);
					$stmt->bindParam(':email', $mail);
					$stmt->bindParam(':hash', $hash);
					$stmt->execute();
					$last_id = $conn->lastInsertId();

					$smsRegister="Se ha registrado correctamente!";

					$_SESSION['idUser']=$last_id;
					header('Refresh:3; cuenta.php');
				} 		
				   		
			}catch(PDOException $e) {
				
			    echo "Error: " . $e->getMessage();
			}

			$conn = null;
		}
	}
?>