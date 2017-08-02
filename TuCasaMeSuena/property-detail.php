<?php 
    //include'include/header.inc';
    include 'include/property-detail.inc';
?>
<!-- banner -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"><a href="#">Inicio</a> / Información detallada</span>
        <h2>Información detallada</h2>
    </div>
</div>
<!-- banner -->

<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">
                <div class="hot-properties hidden-xs">
                    <h4>Vistas por otros usuarios</h4>
                    
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"/>
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"/>
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/>
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/2.jpg" class="img-responsive img-circle" alt="properties"/>
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>
                </div>

               <!-- <div class="advertisement">
                    <h4>Advertisements</h4>
                    <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">
                </div>-->
            </div>

            <div class="col-lg-9 col-sm-8 ">
                <h2>Lorem ipsum, consectetur elit. </h2>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                
                                <div class="carousel-inner" role="listbox">
                                    <?php                                      
                                        $img=dameImg(); 
                                        foreach ($img as $valor) {
                                            echo $valor;
                                        }
                                    ?>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#myCarousel"  role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel"  role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <!-- Indicators -->
                                <ol class="carousel-indicators  visible-sm-block hidden-xs-block visible-md-block visible-lg-block">
                                    <?php 
                                        $imgMini=dameImgMini(); 
                                        foreach ($imgMini as $valor) {
                                            echo $valor;
                                        }
                                    ?>
                                </ol>
                            </div>
                            <!-- #Slider Ends -->
                        </div>
  
                        <div class="spacer">
                            <h4><span class="glyphicon glyphicon-th-list"></span>Detalle de la propiedad</h4>
                           <?php  echo dameDetalleProp();?> 
                        </div>
                        
                        <!-- Localizacion (MAPA)-->
                        <div>
                            <h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>

                            <div  id="map"class="well"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                              <?php  
                                    echo dameInfoProp();
                                ?> 

                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span>Datos del propietario
                                     <?php  echo dameNomApProp();?>
                                </div>
                            </div>
                        </div>

                    <?php 
                        	$sms='';

                        	if(isset($_SESSION['idUser']) && $_SESSION['idUser']!=''){

                        		$id=$_SESSION['idUser'];

                        		$stmt = $conn->prepare("SELECT email, nombre FROM tbclientes WHERE idclientes=$id"); 
	                            $stmt->execute();

	                            // set the resulting array to associative
	                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	                            $emailUser=$stmt->FetchAll();

                                //que no aparezca la ocion de mandar mensaje si el enmueble es del usuario
                                $stmt = $conn->prepare("SELECT i.idinmueble FROM tbclientes as c INNER JOIN tbinmuebles as i ON i.idcliente=c.idclientes where c.idclientes=$id"); 
                                $stmt->execute();

                                // set the resulting array to associative
                                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                                $idUser=$stmt->FetchAll();
                                $flag=false;

                                for ($i=0; $i < count( $idUser); $i++) { 
                                    if($idUser[$i]['idinmueble']==$idProp){
                                        $flag=true;
                                    }
                                    
                                }

                                if($flag==false){
                                    echo'
                                        <div class="col-lg-12 col-sm-6 ">
                                            <div class="enquiry">
                                                <h6><span class="glyphicon glyphicon-envelope"></span> Contacto con el propietario</h6>
                                            
                                                <form role="form" method="post">
                                                    <input type="text" class="form-control" readonly="readonly" placeholder="'.$emailUser[0]['nombre'].'"/>
                                                    <input type="text" class="form-control" readonly="readonly" placeholder="'.$emailUser[0]['email'].'"/>
                                                    <input type="text" class="form-control" placeholder="Teléfono" name="tlf"/>
                                                    <textarea rows="6" class="form-control" placeholder="Mensaje" name="sms"></textarea>
                                                    <span class="spanSMS">'.$sms.'</span>
                                                    <input type="hidden"  name="idProp" value="'.$idProp.'">
                                                    <button type="submit" class="btn btn-primary" name="enviarSMS">Enviar mensaje</button>
                                                </form>
                                            </div>         
                                        </div>
                                    ';
                                }
                        	}


                        	if(isset($_POST['enviarSMS'])){

                        		if($_POST['sms']!=''){

                        			$sms=$_POST['sms'];
                        			$idProp=$_POST['idProp'];

                        			if($_POST['tlf']!=''){
                        				$tlf=$_POST['tlf'];
                        			}

                        			

                        			$stmt = $conn->prepare("INSERT INTO tbsolicitudes (idcliente, idinmueble, comentarios, telefono) VALUES (:idCliente, :idinmueble, :comentarios, :telefono)");
							 
										$stmt->bindParam(':idCliente', $id);
										$stmt->bindParam(':idinmueble', $idProp);
										$stmt->bindParam(':comentarios', $sms);
										$stmt->bindParam(':telefono', $tlf);

										$stmt->execute();

									$sms="Correo se ha enviado correctamente.";
									
                        		}else{
                        			$sms="Debe escribir algo en el campo de mensaje.";
                        		}
                        		
                        	}
                    ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include'include/footer.inc';?>