<?php 
    if(isset($_GET['id'])){
        var_dump($_GET['id']); 
        require('includes/cabecera.php');
        $resultado=mostrar_entrada($coneccion,$_GET['id']);
        $entrada_actual= $resultado ? mysqli_fetch_assoc($resultado) : null;

?>
        
        <section class="cuerpo">
        
        <section class="contenido contenido_crear">
               
        <form action="actualizar_entrada_logica.php" method="post" class="form_crear">
        <h3 class="titulo_crear">Actualizar Entrada</h3>
            
            <p class="p_crear">Bienvenido <?= $_SESSION['login']['nombre']?> </p>
            <?php echo isset($_SESSION['completado']) ? registro_ok() : '' ?>
            <label for="titulo">titulo</label>
            <input type="text" name="titulo" id=""  required pattern="[A-Za-z]+" value="<?= $entrada_actual['titulo']?>"  placeholder="<?= $entrada_actual['titulo']?>">
            <?php echo isset($_SESSION['errores']['titulo']) ? mostrar_errores($_SESSION['errores'],'titulo') : ''; ?>
    
            <label for="descripcion">descripcion</label>
            <textarea type="text" name="descripcion" id="" required placeholder="<?= $entrada_actual['descripcion']?>"><?=$entrada_actual['descripcion']?></textarea>
            <?php echo isset($_SESSION['errores']['descripcion']) ? mostrar_errores($_SESSION['errores'],'descipcion') : ''; ?>
            <button type="submit" class="b-actualizar" name="actualizar" value="<?=$_GET['id'] ?>">actualizar</button>
        </form>  
         <?php echo isset($_SESSION['errores']['faltan_datos']) ? mostrar_errores($_SESSION['errores'],'faltan_datos') : ''; ?>
    
        </section>
         <?php 
        
        require('includes/aside.php');
       !empty($_SESSION['errores']) || !empty($_SESSION['completado']) ? borrar_errores() : '';
        
        ?>
    
    <?php }else{
        var_dump($_GET['id']);
        die;
        header('location: index.php');
     } ?>