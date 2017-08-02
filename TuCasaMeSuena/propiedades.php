<?php 
    include'include/header.inc';
    
?>
<!-- banner -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"><a href="index.php">Inicio</a> / <?php echo $p ?></span>
        <h2><?php echo $p ?></h2>
        
    </div>
</div>
<!-- banner -->

<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div class="col-lg-3 col-sm-4 ">
                <!-- Formulario busqueda -->
                <form method="post">
                    <div class="search-form">
                        <h4><span class="glyphicon glyphicon-search"></span>Buscar</h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <select class="form-control">
                                    <option>Zona</option>
                                    <option>Item 1</option>
                                    <option>Item 2</option>
                                    <option>Item 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <?php  
                                    if($p=='Venta'){
                                        echo'<input type="text" class="form-control" placeholder="Venta" readonly>';
                                    }

                                    if ($p=='Alquiler'){
                                        echo'<input type="text" class="form-control" placeholder="Alquiler" readonly>';
                                    }
                                ?>
                            </div>

                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>m2</option>
                                    <option>Item 1</option>
                                    <option>Item 2</option>
                                    <option>Item 3</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control">
                                    <option>Baños</option>
                                    <option>Item 1</option>
                                    <option>Item 2</option>
                                    <option>Item 3</option>
                                </select>
                            </div>

                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Cuartos</option>
                                    <option>Item 1</option>
                                    <option>Item 2</option>
                                    <option>Item 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form> 
                
                <div class="hot-properties hidden-xs">
                    <h4>Propirdades destacadas</h4>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties">
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties">
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5>
                                <a href="property-detail.php">Integer sed porta quam</a>
                            </h5>
                            <p class="price">$300,000</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties">
                        </div>

                        <div class="col-lg-8 col-sm-7">
                            <h5>
                                <a href="property-detail.php">Integer sed porta quam</a>
                            </h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties">
                        </div>
                        
                        <div class="col-lg-8 col-sm-7">
                            <h5>
                                <a href="property-detail.php">Integer sed porta quam</a>
                            </h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">Pagina: 12 de 100</div>
                </div>

                <div class="row">
                    <?php  
                        if (isset($_GET['p']) && !isset($_GET['b'])) {
                            $p=$_GET['p'];

                            $stmt = $conn->prepare("SELECT inmu.idinmueble, inmu.zona, inmu.modalidad ,inmu.banios, inmu.habitaciones, inmu.superficie, inmu.precio, imag.imagen FROM tbinmuebles as inmu INNER JOIN tbimagenes as imag ON inmu.idinmueble=imag.idinmueble WHERE inmu.modalidad='$p' GROUP BY inmu.idinmueble"); 

                            $stmt->execute();

                            // set the resulting array to associative
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                            $prop=$stmt->FetchAll();

                            for ($i=0; $i < count($prop) ; $i++) { 
                                echo '
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="properties">
                                            <div class="image-holder">
                                                <img src="'.$prop[$i]['imagen'].'" class="img-responsive" alt="properties"/>
                                            </div>
                                            
                                            <h4><a href="property-detail.php"> '.$prop[$i]['zona'].'</a></h4>

                                            <p>
                                                <i class="fa fa-bath iconmargin" aria-hidden="true"> '.$prop[$i]['banios'].'</i>
                                                <i class="fa fa-bed iconmargin" aria-hidden="true"> '.$prop[$i]['habitaciones'].'</i>
                                                <i class="fa fa-cube iconmargin" aria-hidden="true"> '.$prop[$i]['superficie'].'</i>
                                            </p>

                                            <h4 class="pull-center">'.number_format($prop[$i]['precio'], 0, '', '.').' €</h4>

                                             <a class="btn btn-primary" href="property-detail.php?cod='.$prop[$i]['idinmueble'].'">View Details</a>
                                        </div>
                                    </div>
                                ';
                            }

                        }elseif(isset($_GET['p']) && isset($_GET['b'])){
                            $p=$_GET['p'];
                            $b=$_GET['b'];

                            

                            $stmt->execute();

                            // set the resulting array to associative
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                            $prop=$stmt->FetchAll();

                            for ($i=0; $i < count($prop) ; $i++) { 
                                echo '
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="properties">
                                            <div class="image-holder">
                                                <img src="'.$prop[$i]['imagen'].'" class="img-responsive" alt="properties"/>
                                            </div>
                                            
                                            <h4><a href="property-detail.php"> '.$prop[$i]['zona'].'</a></h4>

                                            <p>
                                                <i class="fa fa-bath iconmargin" aria-hidden="true"> '.$prop[$i]['banios'].'</i>
                                                <i class="fa fa-bed iconmargin" aria-hidden="true"> '.$prop[$i]['habitaciones'].'</i>
                                                <i class="fa fa-cube iconmargin" aria-hidden="true"> '.$prop[$i]['superficie'].'</i>
                                            </p>

                                            <h4 class="pull-center">'.number_format($prop[$i]['precio'], 0, '', '.').' €</h4>

                                             <a class="btn btn-primary" href="property-detail.php?cod='.$prop[$i]['idinmueble'].'">View Details</a>
                                        </div>
                                    </div>
                                ';
                            }

                        }


                    ?>

                    <div class="center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include'include/footer.inc';?>