<?php 
    require('includes/cabecera.php');
  
?>
<?php if($_SESSION['login']){?>

        
    <section class="cuerpo">
        
    <section class="contenido contenido_crear">
           
    <form action="actualizar_usuario_logica.php" method="post" class="form_crear">
    <h3 class="titulo_crear">Actualizar Usuario</h3>
        
        <p class="p_crear">Bienvenido <?= $_SESSION['login']['nombre']?> </p>
        <?php echo isset($_SESSION['completado']) ? registro_ok() : '' ?>
        
        <input type="text" name="nombre" id=""  placeholder="<?= $_SESSION['login']['nombre']?>">
        <?php echo isset($_SESSION['errores']['nombre']) ? mostrar_errores($_SESSION['errores'],'nombre') : ''; ?>

        <input type="text" name="apellido" id=""  placeholder="<?= $_SESSION['login']['apellido']?>">
        <?php echo isset($_SESSION['errores']['apellido']) ? mostrar_errores($_SESSION['errores'],'apellido') : ''; ?>
        
        <input type="email" name="email" id=""   placeholder="<?= $_SESSION['login']['email']?>">
        <?php echo isset($_SESSION['errores']['email']) ? mostrar_errores($_SESSION['errores'],'email') : ''; ?>
        <button type="submit" class="b-actualizar" name="actualizar">actualizar</button>
    </form>  
     <?php echo isset($_SESSION['errores']['faltan_datos']) ? mostrar_errores($_SESSION['errores'],'faltan_datos') : ''; ?>

    </section>
     <?php 
    
    require('includes/aside.php');
    
?>
 </section>
 <?php !empty($_SESSION['errores']) || !empty($_SESSION['completado']) ? borrar_errores() : ''?>
 </section>
</body>
</html>
<?php } else {
                header('location: index.php');
            }?>