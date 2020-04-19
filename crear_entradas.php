<?php 
    require('includes/cabecera.php');
   
    
?>
<?php if($_SESSION['login']){?>
<section class="cuerpo">
        

        
        <section class="contenido contenido_crear">
           
    <form action="crear_entradas_logica.php" method="post" class="form_crear">
    <h3 class="titulo_crear">Crear Entradas</h3>
        <p class="p_crear">añade una Entrada para que los usuarios puedan disfrutarla</p>
      
        <input type="text" name="titulo" id=""   required placeholder="Ingrese Titulo">
        <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'titulo') : ''; ?>
    
       <textarea name="descripcion" id="" cols="30" rows="10" required placeholder="Ingrese descripcion"></textarea>
       <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'descripcion') : ''; ?>
      
        <p class="p_crear">Seleccione una categoria</p>
        <select name="categorias" id="">
       
        <?php $categorias=mostrar_categoria($coneccion); 
            while($categoria=mysqli_fetch_assoc($categorias)):     ?>
            <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
                
        <?php endwhile?>
    </select>
        <button type="submit" name="send_entrada">Crear</button>
    </form>  
     <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'categoria_existente') : ''; ?>

    </section>
     <?php 
    
    require('includes/aside.php');
?>
 
 <?php !empty($_SESSION['errores']) ? borrar_errores() : ''?>
 </section>
</body>
</html>
            <?php } else {
                header('location: index.php');
                
            }?>

