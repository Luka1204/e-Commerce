<h1>Registrarse</h1>

<?php
if(isset($_SESSION['register']) && $_SESSION['register'] == 'completed' ):?>
    <strong class="alert_green">Registro Exitoso!</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>
    <strong class="alert_red">Registro Fallido! Por favor,ingrese bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST">
    
     <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'nombre') :'' ?>
    <label for="txtNombre">Nombre:</label>
    <input type="text" name="txtNombre" required="required">
    
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'apellido') :'' ?>
    <label for="txtApellido">Apellido:</label>
    <input type="text" name="txtApellido" required="required">
    
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'email') :'' ?>
    <label for="txtEmail">Email</label>
    <input type="email" name="txtEmail" required="required">
    
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'password') :'' ?>
    <label for="txtPass">Contraseña:</label>
    <input type="password" name="txtPass" required="required">
    
    <input type="submit" value="Registrarse" name="btnSubmit">
    
</form>
    
     <?php Utils::deleteSession('errores');?>