<?php
    include 'include/header.inc';
    include 'include/index.inc';
?> 

<div class="">
    <div id="slider" class="sl-slider-wrapper"> 
        <div class="sl-slider">
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-1"></div>
                    <h2>La experiencia y profesionalidad nos hacen diferentes</h2>

                    <blockquote>
                        <p class="location">Lorem ipsum 345 dolor, Consectetur.</p>
                        <p>Similique soluta blanditiis laboriosam consectetur iusto dignissimos deleniti...</p>
                    </blockquote> 
                </div>
            </div>
          
            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-2"></div>

                    <h2>La satisfacción de cientos de clientes es nuestra mejor garantía</h2>
                
                    <blockquote>              
                        <p class="location"> 1890 Syndey, Australia</p>
                        <p>Esse totam asperiores ratione, aperiam qui vero cupiditate. <br>OTF officia tupiditat fexcep </p>
                        
                    </blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-3"></div>
                    <h2> Ofrecemos soluciones, no promesas.</a></h2>
                    
                    <blockquote>              
                        <p class="location">Officia Deserunt Mollit Anim</p>
                        <p>¿Excepteur sint occaecat cupidatat non-proident, sunt in culpa?</p>
                    </blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-4"></div>
                    <h2>Buenos negocios, buenos inmuebles. Esta es tu oprtunidad</h2>
                  
                    <blockquote>              
                        <p class="location">Repellendus Maudantium Wuos</p>
                        <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.
                        Ipsam ab eius hic sequi 230.00€ temporibus voluptatem! Et velit autem 2 commodi aspernatur 4 rerum architecto 120 molestias!</p>
                    </blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-5"></div>
                    <h2>Tu casa, la vemos como tú.</h2>
                  
                    <blockquote>              
                        <p class="location">Repellendus ex placeat</p>
                        <p>Aspernatur rerum architecto molestias!</p>
                    </blockquote>
                </div>
            </div>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>
    </div><!-- /slider-wrapper -->
</div> 

<div class="banner-search">
    <div class="container"> 
        <!-- banner -->
        <h3>Encuentra tu casa</h3>
        <div class="searchbar">
            <div class="row">
                <form method="post">
                    <div class="col-lg-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Zona</option>
                                        <?php 
                                            $zonas=cargarZonas();
                                            foreach ($zonas as $valor) {
                                                echo $valor;
                                            }
                                        ?>   
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" name=modalidad>
                                    <option>Estado</option>
                                    <option>Venta</option>
                                    <option>Alquiler</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control ">
                                    <option>Habit.</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Baños</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option name='m2'>m2</option>
                                    <option name='50'>50-100</option>
                                    <option name='100'>100-150</option>
                                    <option name='150'>150-200</option>
                                    <option name='200'>200-250</option>
                                    <option name='250'>250-300</option>
                                    <option name='300'>300-400</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <input type="text" class="form-control" placeholder="Precio min.">
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <input type="text" class="form-control" placeholder="Precio max.">
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <button class="btn btn-success"  type="submit" name='buscar'>Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
                    
                <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                    <p>Es fácil y rápido. Busca o vende tu inmueble de la forma más sencilla y disfruta de todas las ventajas de ser un usuario</p>
                    <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Mi cuenta</button>
                    
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='registro.php'">Regístrate</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- banner -->
<div class="container">
    <!-- DESTACADOS EN VENTA -->
    <div class="properties-listing spacer">
        <a href="propiedades.php?p=Venta" class="pull-right viewall">View All Listing</a>
        <h2>Destacados en venta</h2>

        <div id="owl-example" class="owl-carousel">
            <?php  
                $destVenta=dameDestacadosVenta(); 
                foreach ($destVenta as $valor) {
                    echo $valor;
                }
            ?>
        </div>
    </div>

    <!-- DESTACADOS EN ALQUILER -->     
    <div class="properties-listing spacer">
        <a href="propiedades.php?p=Alquiler" class="pull-right viewall">View All Listing</a>
        <h2>Destacados en alquiler</h2>

        <div id="owl-example1" class="owl-carousel">
            <?php  
                $destAlqui=dameDestacadosAlquiler(); 
                foreach ($destAlqui as $valor) {
                    echo $valor;
                }
            ?>
        </div>
    </div>

    <div class="spacer">
        <div class="row">
            <div class="col-lg-12 col-sm-12 recent-view">
                <h3>Sobre nosotros</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
                <a href="about.php">Learn More</a></p>
            </div>
        </div>
    </div>
</div>
<?php include'include/footer.inc'; ob_end_flush();?>