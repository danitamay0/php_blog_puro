<?php 
    require('includes/cabecera.php');
  
?>
<?php if($_SESSION['login']){?>

        
    <section class="cuerpo"> 
        
        <section class="contenido contenido_crear">
           
    <form action="crear_categoria_logica.php" method="post" class="form_crear">
    <h3 class="titulo_crear">Crear Categoría</h3>
        <p class="p_crear">añade una categora para que los usuarios puedan usarla al crear entradas</p>
        <input type="text" name="categoria" id="" required pattern="[A-Za-z]+" placeholder="Ingrese Categoría">
        <button type="submit">Crear</button>
    </form>  
     <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'categoria_existente') : ''; ?>

    </section>
     <?php  require('includes/aside.php');?>
    
   </section>

 
 <?php !empty($_SESSION['errores']) ? borrar_errores() : ''?>
 </section>
</body>
</html>
<?php } else {
                header('location: index.php');
            }?>