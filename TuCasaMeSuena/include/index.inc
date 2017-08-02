<?php  
	//destacados en venta
	$stmt = $conn->prepare("SELECT inmu.idinmueble, inmu.zona, inmu.modalidad ,inmu.banios, inmu.habitaciones, inmu.superficie, inmu.precio, imag.imagen FROM tbinmuebles as inmu INNER JOIN tbimagenes as imag ON inmu.idinmueble=imag.idinmueble WHERE inmu.modalidad='Venta' GROUP BY inmu.idinmueble"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $propVent=$stmt->FetchAll();

    function dameDestacadosVenta(){
    	global $propVent;
        $datos=array();

    	for ($i=0; $i < 10; $i++) {
           	$datos[$i]='
                <div class="properties">
                    <div class="caption">
                        <img src="'.$propVent[$i]['imagen'].'" class="img-responsive" alt="properties"/>
                        <h4><a href="property-detail.php">'.$propVent[$i]['zona'].'</a></h4>
                        <p>
                            <i class="fa fa-bath iconmargin" aria-hidden="true"> '.$propVent[$i]['banios'].'</i>
                            <i class="fa fa-bed iconmargin" aria-hidden="true"> '.$propVent[$i]['habitaciones'].'</i>
                            <i class="fa fa-cube iconmargin"> '.$propVent[$i]['superficie'].'</i>
                        </p>
                        <h4 class="pull-center">'.number_format($propVent[$i]['precio'], 0, '', '.').' €</h4>
                    </div>

                    <a class="btn btn-primary" href="property-detail.php?cod='.$propVent[$i]['idinmueble'].'">View Details</a>
                </div>
           ';
        }
        return $datos;
    }


    //destacados en alquiler
    $stmt = $conn->prepare("SELECT inmu.idinmueble, inmu.zona, inmu.modalidad ,inmu.banios, inmu.habitaciones, inmu.superficie, inmu.precio, imag.imagen FROM tbinmuebles as inmu INNER JOIN tbimagenes as imag ON inmu.idinmueble=imag.idinmueble WHERE inmu.modalidad='Alquiler' GROUP BY inmu.idinmueble"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $propAl=$stmt->FetchAll();

    function dameDestacadosAlquiler(){
    	global $propAl;
    	$datos=array();

        for ($i=0; $i < 10; $i++) {
           	$datos[$i]='
                <div class="properties">
                    <div class="caption">
                        <img src="'.$propAl[$i]['imagen'].'" class="img-responsive" alt="properties"/>
                        <h4><a href="property-detail.php">'.$propAl[$i]['zona'].'</a></h4>
                        <p>
                            <i class="fa fa-bath iconmargin" aria-hidden="true"> '.$propAl[$i]['banios'].'</i>
                            <i class="fa fa-bed iconmargin" aria-hidden="true"> '.$propAl[$i]['habitaciones'].'</i>
                            <i class="fa fa-cube iconmargin"> '.$propAl[$i]['superficie'].'</i>
                        </p>
                        <h4 class="pull-center">'.number_format($propAl[$i]['precio'], 0, '', '.').' €</h4>
                    </div>
                    <a class="btn btn-primary" href="property-detail.php?cod='.$propAl[$i]['idinmueble'].'">View Details</a>
                </div>

           ';
        }

        return $datos;
    }

    //Cargamos zonas en el option (filtros index) 
    $stmt = $conn->prepare("SELECT DISTINCT zona FROM tbinmuebles ORDER BY zona ASC");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $zonas=$stmt->FetchAll();

    function cargarZonas(){
        global $zonas;
        $datos=array();

        for ($i=0; $i < count($zonas); $i++) {
            $datos[$i]='
                <option>'.$zonas[$i]['zona'].'</option>';
        }

        return $datos;
    }

    if(isset($_POST['buscar'])){

        if($_POST['modalidad']=='Venta'){
            header('location: propiedades.php?p=Venta?b=1');
        }

        if($_POST['modalidad']=='Alquiler'){
            header('location: propiedades.php?p=Alquiler?b=2');
        }


    }
?>