<?php 
    include'include/header.inc';
    include'include/aniadirProp.inc';
    include'include/cuenta.inc';
?>

<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"><a href="#">Inicio</a> / Mi cuenta</span>
        <h2>
            <?php global $usernombre; echo 'Bienvenido '.$usernombre['nombre'];?>
        </h2>
    </div>
</div>
<!-- banner -->

<div class="container">
    <div class="spacer blog">
        <span><a style="float: right;" href="include/salir.php">Salir de mi cuenta</a></span>

        <div class="properties-listing spacer">
            <h2 style="display: inline-block;">Propiedades en venta</h2>
            
            <div class="row">
                <!-- Propiedades venta del uauario-->
                <div class="col-lg-8 col-sm-12 ">
                    <div class="row">
                        <?php
                            $venta=dameVentas(); 

                            if($venta!=null){
                                foreach ($venta as $valor) {
                                    echo $valor;
                                }
                            }
                         ?>
                    </div>
                </div>

                <!-- Menu -->
                <div class="col-lg-4 col-sm-12">
                    <!-- tabs -->
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a class="cuentaMenu" href="#tab1" data-toggle="tab">Añadir propiedad</a>
                            </li>
                            <li class="">
                                <a class="cuentaMenu" href="#tab2" data-toggle="tab">Interesado en</a>
                            </li>
                            <li class="">
                                <a class="cuentaMenu" href="#tab3" data-toggle="tab">Propuestas de</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <form method="post" enctype="multipart/form-data"> 
                                    <div class="col-lg-12 col-sm-6 col-xs-12 ">
                                        <input type="text" class="form-control" placeholder="Zona" name="zona">
                                        <input type="txt" class="form-control" placeholder="Metros cuadrados" name="metros">
                                        <input type="text" class="form-control" placeholder="Baños" name="banos">
                                        <input type="text" class="form-control" placeholder="Habitaciones" name="habitaciones">
                                        <input type="text" class="form-control" placeholder="Antiguedad" name="age">
                                        <select class="form-control" name="modo">
                                            <option>Modo</option>
                                            <option>Venta</option>
                                            <option>Alquiler</option>
                                        </select>
                                        <input type="text" class="form-control" placeholder="Precio" name="precio">
                                        <textarea style="margin-bottom: 15px;" class="form-control" placeholder="Descripción" name="descrip"></textarea>
                                        <input id="fileToUpload" type="file" class="file" name="fileToUpload[]" multiple="">

                                        <button type="submit" class="btn btn-success" name="submit">Publicar propiedad</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab2"> 
                                <ul  class="list-unstyled">
                                    <?php
                                        $casas=dameInteresados(); 

                                        if($casas!=null){
                                            foreach ($casas as $valor) {
                                                echo $valor;
                                            }
                                        }
                                        
                                    ?>
                                </ul>
                            </div>

                            <div class="tab-pane" id="tab3">
                                <ul class="list-unstyled">      
                                   <?php  
                                        $personas=damePropuestas(); 

                                        if($personas!=null){
                                            foreach ($personas as $valor) {
                                                echo $valor;
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- tabs -->
                </div>
            </div>

            <h2 style="display: inline-block;">Propiedades en alquiler</h2>
            
            <div class="row">
                <!-- Propiedades en alquiler del usuario -->
                <div class="col-lg-8 col-sm-12 ">
                    <div class="row">
                        <?php
                            $alq=dameAlquiler(); 

                            if($alq!=null){
                                foreach ($alq as $valor) {
                                    echo $valor;
                                }
                            }
                         ?>
                      <!--   <div class="row propiedades">
                            <div class="col-lg-4 col-sm-4 ">
                                <a href="blogdetail.php" class="thumbnail">
                                    <img src="images/blog/4.jpg" alt="blog title">
                                </a>
                            </div>

                            <div class="col-lg-8 col-sm-8">
                                <h3>
                                    <a href="blogdetail.php">Creative business to takeover the market</a>
                                </h3>
                            
                                <div class="info">
                                    <p>
                                        <i class="fa fa-calendar cuentaIcon" aria-hidden="true"> 20/03/2017</i>
                                        <i class="fa fa-bath cuentaIcon" aria-hidden="true"> 2</i>
                                        <i class="fa fa-bed cuentaIcon" aria-hidden="true"> 4</i>
                                        <i class="fa fa-cube cuentaIcon" aria-hidden="true"> 150m2</i>
                                    </p>
                                </div>

                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                <a href="blogdetail.php" class="more">Read More</a>
                            </div>
                        </div>
                        
                        <div class="row propiedades">
                            <div class="col-lg-4 col-sm-4 ">
                                <a href="blogdetail.php" class="thumbnail">
                                    <img src="images/blog/4.jpg" alt="blog title">
                                </a>
                            </div>

                            <div class="col-lg-8 col-sm-8 ">
                                <h3>
                                    <a href="blogdetail.php">Creative business to takeover the market</a>
                                </h3>
                            
                                <div class="info">
                                    <p>
                                        <i class="fa fa-calendar cuentaIcon" aria-hidden="true"> 20/03/2017</i>
                                        <i class="fa fa-bath cuentaIcon" aria-hidden="true"> 2</i>
                                        <i class="fa fa-bed cuentaIcon" aria-hidden="true"> 4</i>
                                        <i class="fa fa-cube cuentaIcon" aria-hidden="true"> 150m2</i>
                                    </p>
                                </div>

                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                <a href="blogdetail.php" class="more">Read More</a>
                            </div>
                        </div>

                        <div class="row propiedades">
                            <div class="col-lg-4 col-sm-4 ">
                                <a href="blogdetail.php" class="thumbnail">
                                    <img src="images/blog/4.jpg" alt="blog title">
                                </a>
                            </div>

                            <div class="col-lg-8 col-sm-8 ">
                                <h3>
                                    <a href="blogdetail.php">Creative business to takeover the market</a>
                                </h3>
                            
                                <div class="info">
                                    <p>
                                        <i class="fa fa-calendar cuentaIcon" aria-hidden="true"> 20/03/2017</i>
                                        <i class="fa fa-bath cuentaIcon" aria-hidden="true"> 2</i>
                                        <i class="fa fa-bed cuentaIcon" aria-hidden="true"> 4</i>
                                        <i class="fa fa-cube cuentaIcon" aria-hidden="true"> 150m2</i>
                                    </p>
                                </div>

                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                <a href="blogdetail.php" class="more">Read More</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php include'include/footer.inc';?>