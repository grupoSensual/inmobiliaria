<?php  
	include'include/header.inc';

	if(isset($_GET['cod'])){
        $idProp=$_GET['cod'];
    }

	//Imagenes carusel
	$stmt = $conn->prepare("SELECT imagen FROM tbimagenes WHERE idinmueble=$idProp"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $img=$stmt->FetchAll();



    function dameImg(){
    	global $img;

    	for ($i=0; $i < count($img); $i++) { 

	        if($i==0){
	            $datos[$i]='
	                <div class="item active">
	                    <img src="'.$img[$i]['imagen'].'" class="properties img-responsive" alt="properties" />
	                </div>
	            ';

	        }else{
	        
	             $datos[$i]='
	                <div class="item">
	                    <img src="'.$img[$i]['imagen'].'" class="properties img-responsive" alt="properties"/>
	                </div>
	            ';
	        }
	    }

    	return $datos;
    }

    $stmt = $conn->prepare("SELECT imagen FROM tbimagenes WHERE idinmueble=$idProp"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $img2=$stmt->FetchAll();

    function dameImgMini(){
    	global $img2;

    	for ($i=0; $i < count($img2); $i++) { 
           	$datos[$i]='
                <li data-target="#myCarousel" data-slide-to="'.$i.'" class="active">
                    <img src="'.$img2[$i]['imagen'].'" class="properties img-responsive" alt="properties" />
                </li>
           ';
        }

        return $datos;
    }

    //detalle propiedad
    $stmt = $conn->prepare("SELECT * FROM tbinmuebles WHERE idinmueble=$idProp"); 
	$stmt->execute();

	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	$prop=$stmt->FetchAll();

	function dameDetalleProp(){
		global $prop;
		return '
		<p>'.$prop[0]['descripcion'].'</p>
		';
	}

	//informacion propiedad
	function dameInfoProp(){
		global $prop;

		return '
            <p style="color: #1d2740;" class="price">'.number_format($prop[0]['precio'], 0, '', '.').' €</p>
            
            <p class="area">
            	<span class="glyphicon glyphicon-map-marker"></span>
            	<span id="zona">'.$prop[0]['zona'].'</span>
            </p>
            <div class="profile">
                <h6><span class="glyphicon glyphicon-home"></span>Disponibilidad</h6>
                <div class="listing-detail">
                    <p>
                        <i class="fa fa-bath iconmargin" aria-hidden="true"> '.$prop[0]['banios'].'</i>
                        <i class="fa fa-bed iconmargin" aria-hidden="true"> '.$prop[0]['habitaciones'].'</i>
                        <i class="fa fa-cube iconmargin" > '.$prop[0]['superficie'].'</i>
                    </p>
                </div>
            </div>
        ';
	}

	
	//Informacion del propetario de la casa
	$stmt = $conn->prepare(" SELECT i.idinmueble, c.nombre, c.apellidos FROM tbclientes as c INNER JOIN tbinmuebles as i ON i.idcliente=c.idclientes WHERE i.idinmueble=$idProp"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $nomAp=$stmt->FetchAll();

    function dameNomApProp(){
    	global $nomAp;
    	return '<p>'.$nomAp[0]['nombre'].' '.$nomAp[0]['apellidos'].'</p>';
    }
    

    

?>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {zoom: 15});
        var geocoder = new google.maps.Geocoder;
        var Idzona = document.getElementById('zona');
     	var address = Idzona.innerHTML.trim();

        geocoder.geocode({'address': address}, function(results, status) {
	        if (status === 'OK') {
	            map.setCenter(results[0].geometry.location);

	            new google.maps.Marker({
	                map: map,
	                position: results[0].geometry.location
	            });

	        } else {
	            window.alert('Geocode was not successful for the following reason: ' + status);
	        }
	    });
	 }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpbXE61YFmQH9XLn8rfFlRHQOuOXdab3I&region=ES&callback=initMap"
    async defer>
</script>