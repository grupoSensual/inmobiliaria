<?php 
    include'include/header.inc';
    require 'include/registro.inc';
?>
<!-- banner -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right">
            <a href="#">Inicio</a> 
            / Registro
        </span>
        <h2>Registro</h2>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="spacer">
        <div class="row register">
            <form method="post">
                <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                <input type="txt" class="form-control" placeholder="Apellidos" name="apelli">
                <input type="email" class="form-control" placeholder="Email" name="mail">
                <input type="password" class="form-control" placeholder="Contraseña" name="pass">

                <span class='spanSMS'><?php echo $smsRegister; ?></span>
               
                <button type="submit" class="btn btn-success" name="registro">Registrarse</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include'include/footer.inc';?>