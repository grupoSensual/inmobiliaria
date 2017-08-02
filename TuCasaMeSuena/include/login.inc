<?php  
	include 'password.inc';
	$usuario='admin';
	$pass='1234';

	if(isset($_POST['usuario']) && isset($_POST['pass'])){

		if($_POST['usuario']=='admin' && $_POST['pass']=='1234'){
			$_SESSION['usuario']=$_POST['usuario'];
			$_SESSION['pass']=$_POST['pass'];
			//header('Location: pelisCRUD.php');
		}else{
			$errReg='Datos introducidos son incorrectos!';
		}
	}
	
	if(isset($_POST["submitLogin"])){
		$pass=test_input($_POST["pass"]);
		$mail=test_input($_POST["mail"]);

		$_SESSION["usuarioadmin"]=$mail;

		if($pass=="" || $mail==""){
			echo "Debe rellenar todos los campos";
		}elseif($mail=="jjkoyote@gmail.com" && $pass=="3496"){
			//header("location:admin.php?id=1");
		}else{
			try {
				$stmt = $conn->prepare("SELECT email, idclientes, contrasena FROM tbclientes WHERE email=:mail");
				$stmt->bindParam(':mail', $mail);
				$stmt->execute();
				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				//no se puede usar fetchall() mas de una vez se usa una variable
				$track=$stmt->fetchAll()[0];
				$siemail=$track["email"];
				$id=$track["idclientes"];
				$passed=$track["contrasena"];
				if ($siemail==$mail && password_verify($pass, $passed)){
					$_SESSION['idUser']=$id;
					header('location:cuenta.php');
				}elseif($siemail==$mail && !password_verify($pass, $passed)){
				   	echo "Su contraseña es incorrecta ";
				}else{
				   	echo "Debe registrarse";
				}
			}catch(PDOException $e) {
			    echo "Error: " . $e->getMessage();
			}
		}
	}
?>