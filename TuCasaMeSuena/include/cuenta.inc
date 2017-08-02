<?php 
	//Sacamos informacion de las personas interesadas en nuestras propiedades
	$stmt = $conn->prepare("SELECT i.zona, c.idclientes, c.nombre, c.apellidos, c.email, s.fecha, s.comentarios, s.telefono 
	FROM tbsolicitudes as s
	INNER JOIN tbclientes as c ON c.idclientes=s.idcliente
	INNER JOIN tbinmuebles as i ON i.idinmueble=s.idinmueble 
	WHERE i.idcliente=$id 
	GROUP BY i.idinmueble"); 

	$stmt->execute();

  	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	$prop=$stmt->FetchAll();

	function damePropuestas(){
		global $prop;
        $datos=array();

		for ($i=0; $i <count($prop); $i++) { 
            $fecha=date_create($prop[$i]['fecha']);

           	$datos[$i]='
                <li>
                    <div class="profile">
                        <span class="glyphicon glyphicon-user"></span>
                        <a style="color:#8191ab; margin-left: 4px; cursor: pointer;" onclick="dameInfo(\''.$prop[$i]["idclientes"].'\',\''.$prop[$i]["zona"].'\',\''.$prop[$i]["comentarios"].'\',\''.
                            $prop[$i]["telefono"].'\',\''.
                            $prop[$i]["email"].'\')">'.$prop[$i]["nombre"].' '.$prop[$i]["apellidos"].'</a>
                            <span class="info">'.date_format($fecha, 'd/m/y H:i').'</span>
                        <div style="padding-left: 20px; overflow: hidden;" id="'.$prop[$i]["idclientes"].'"></div>
                    </div>
                </li>
            ';
        }

        return $datos;
	}

	//Sacamos informacion en lo que estamos interesados
	$stmt = $conn->prepare("SELECT c.nombre, c.apellidos, c.email, i.idinmueble, i.zona, i.precio, i.modalidad, s.fecha, s.comentarios FROM tbsolicitudes as s 
	INNER JOIN tbinmuebles as i ON i.idinmueble=s.idinmueble 
	INNER JOIN tbclientes as c ON c.idclientes=i.idcliente 
	WHERE s.idcliente=$id"); 

  	$stmt->execute();

  	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	$interes=$stmt->FetchAll();

	function dameInteresados(){
		global $interes;
        $datos=array();

		for ($i=0; $i <count($interes); $i++) { 
            $date=date_create($interes[$i]['fecha']);
            $fecha=date_format($date, 'd/m/y H:i');
            $precio=number_format($interes[$i]["precio"], 0, '', '.').' €';

            $datos[$i]='
                <li>
                    <div class="profile">
                        <span class="glyphicon glyphicon-home"></span>
                        <a style="color:#8191ab; margin-left: 4px; cursor: pointer;" onclick="dameInfo2(\''.$interes[$i]["idinmueble"].'\',\''.$interes[$i]["nombre"].'\',\''.$interes[$i]["apellidos"].'\',\''.$fecha.'\',\''.
                            $interes[$i]["comentarios"].'\',\''.
                            $interes[$i]["email"].'\')">'.$interes[$i]["zona"].' &nbsp;&nbsp;&nbsp;&nbsp;'.$interes[$i]["modalidad"].' &nbsp;&nbsp;&nbsp;&nbsp;'.$precio.'</a>
                        <div style="padding-left: 20px; overflow: hidden;" id="'.$interes[$i]["idinmueble"].'"></div>
                    </div>
                </li>
            ';
        }

        return $datos;
	}

    /*Sacar propiedades en venta publicadas por el usuario*/
    $stmt = $conn->prepare("SELECT i.idinmueble, i.zona, i.modalidad ,i.banios, i.habitaciones, i.superficie, i.precio, img.imagen FROM tbinmuebles as i INNER JOIN tbimagenes as img ON i.idinmueble=img.idinmueble WHERE i.idcliente=$id AND i.modalidad='Venta' GROUP BY i.idinmueble"); 

    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $venta=$stmt->FetchAll();

    function dameVentas(){
        global $venta;
        $ventas=array();

        for ($i=0; $i < count($venta) ; $i++) { 
            $ventas[$i]='
                <div class="row propiedades">
                    <div class="col-lg-4 col-sm-4 ">
                        <a href="blogdetail.php" class="thumbnail">
                            <img src="'.$venta[$i]['imagen'].'">
                        </a>
                    </div>

                    <div class="col-lg-8 col-sm-8">
                        <h3>
                            <a href="blogdetail.php">'.$venta[$i]['zona'].'</a>
                        </h3>
                    
                        <div class="info">
                            <p>
                                <i class="fa fa-calendar cuentaIcon" aria-hidden="true"> 20/03/2017</i>
                                <i class="fa fa-bath cuentaIcon" aria-hidden="true"> '.$venta[$i]['banios'].'</i>
                                <i class="fa fa-bed cuentaIcon" aria-hidden="true"> '.$venta[$i]['habitaciones'].'</i>
                                <i class="fa fa-cube cuentaIcon" aria-hidden="true"> '.$venta[$i]['superficie'].'</i>
                            </p>
                        </div>

                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>

                        <a href="blogdetail.php" class="more">Editar</a>
                    </div>
                </div>
            ';
        }

        return $ventas;
    }

    /*Sacar propiedades en alquiler publicadas por el usuario*/
	
    $stmt = $conn->prepare("SELECT i.idinmueble, i.zona, i.modalidad ,i.banios, i.habitaciones, i.superficie, i.precio, img.imagen FROM tbinmuebles as i INNER JOIN tbimagenes as img ON i.idinmueble=img.idinmueble WHERE i.idcliente=$id AND i.modalidad='Alquiler' GROUP BY i.idinmueble"); 

    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $alqui=$stmt->FetchAll();

    function dameAlquiler(){
        global $alqui;
        $alq=array();

        for ($i=0; $i < count($alqui) ; $i++) { 
            $alq[$i]='
                <div class="row propiedades">
                    <div class="col-lg-4 col-sm-4 ">
                        <a href="blogdetail.php" class="thumbnail">
                            <img src="'.$alqui[$i]['imagen'].'">
                        </a>
                    </div>

                    <div class="col-lg-8 col-sm-8">
                        <h3>
                            <a href="blogdetail.php">'.$alqui[$i]['zona'].'</a>
                        </h3>
                    
                        <div class="info">
                            <p>
                                <i class="fa fa-calendar cuentaIcon" aria-hidden="true"> 20/03/2017</i>
                                <i class="fa fa-bath cuentaIcon" aria-hidden="true"> '.$alqui[$i]['banios'].'</i>
                                <i class="fa fa-bed cuentaIcon" aria-hidden="true"> '.$alqui[$i]['habitaciones'].'</i>
                                <i class="fa fa-cube cuentaIcon" aria-hidden="true"> '.$alqui[$i]['superficie'].'</i>
                            </p>
                        </div>

                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>

                        <a href="blogdetail.php" class="more">Editar</a>
                    </div>
                </div>
            ';
        }

        return $alq;
    }
?>

<script type="text/javascript">
    //Funcion para escribir informacion de las persons interesadas en nuestras propiedades
    function dameInfo(id, zona, coment, tlf, email){
        document.getElementById(id).innerHTML = "<p style='margin-bottom:10px;'>"+zona+"</p>"
        +"<p style='margin-bottom:10px;'>"+coment+"</p>"
        +"<span class='glyphicon glyphicon-earphone'></span>"
        +"<span style='margin-left: 10px;'>"+tlf+"</span><br>"
        +"<span class='glyphicon glyphicon-envelope'></span>"
        +"<span style='margin-left: 10px;'>"+email+"</span><br>"
        +"<a style='float:right; cursor: pointer;' onclick='ocultarInfo("+id+")'>Ocultar</a>";
    }

    //Funcion para escribir informacion de la  interesadas en nuestras propiedades
    function dameInfo2(id, nom, ap, fecha, coment, email){
        document.getElementById(id).innerHTML = "<span style='margin-bottom:10px;'>"+nom+" "+ap+"</span>"
        +"<span style='float: right;'>"+fecha+"</span>"
        +"<p style='margin-bottom:10px; margin-top:10px;'>"+coment+"</p>"
        +"<span class='glyphicon glyphicon-envelope'></span>"
        +"<span style='margin-left: 10px;'>"+email+"</span><br><br>"
        +"<a cursor: pointer;' href='property-detail.php?cod="+id+"'>Visitar propedad</a>"
        +"<a style='float:right; cursor: pointer;' onclick='ocultarInfo("+id+")'>Ocultar</a>";
    }

    function ocultarInfo(id){
      document.getElementById(id).innerHTML="";
    }
</script>