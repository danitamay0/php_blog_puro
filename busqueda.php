<?php
    require('includes/cabecera.php');
    if (isset($_POST['buscar']) && !empty($_POST['titulo'])) {
       
    
?>
    <section class="cuerpo">
        

        <section>
        <section class="contenido">
            

            <?php $entradas=mostrar_entradas($coneccion,4,$_POST['titulo']);
            
              if(!empty($entradas)): 
            while($entrada=mysqli_fetch_assoc($entradas)): ?>
           

             <article class="entrada">
                 <a href="entradas.php?id=<?=$entrada['id']?> ">
               
                
                <h2><?=$entrada['titulo']?></h2>
                <p class="info"><?=$entrada['cnombre'] .' | ' . $entrada['fecha'] ?> | </p>
                <p><?=substr($entrada['descripcion'],0,160) . '...'?></p> 
            </a>
            </article>
           
            <?php endwhile;
            else: ?> 
                <h2>No se encontro articulos con ese titulo</h2>

            <?php endif?>
      </section>
        </section>
       <?php 
       require('includes/aside.php');
        
        ?>
        

    </section>
    <footer>

    </footer>
</body>
</html>

<?php 
} else {
   header('index.php');
}

?>

