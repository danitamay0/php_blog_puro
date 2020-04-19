<?php
    require('includes/cabecera.php');
     $result=mostrar_categoria($coneccion,$_GET['id']);
         
    if (!empty($result)) {
        $category=mysqli_fetch_assoc($result);

    }else {
        header('location: index.php');
    }

?>
    <section class="cuerpo">
        

        
        <section class="contenido">
            <section>
            <h3 class="ultimas">Entradas de <?=$category['nombre']?></h3>

            <?php $entradas=mostrar_entradas_categoria($coneccion,$_GET['id']);
              if(!empty($entradas) && mysqli_num_rows($entradas)>=1): 
                 while($entrada=mysqli_fetch_assoc($entradas)): ?>
           

             <article class="entrada">
                 <a href="entradas.php?id=<?=$entrada['id']?> ">
               
                
                <h2><?=$entrada['titulo']?></h2>
                <p class="info"><?=$entrada['cnombre'] .' | ' . $entrada['fecha'] ?> | </p>
                <p><?=substr($entrada['descripcion'],0,160) . '...'?></p> 
            </a>
            </article>
           
            <?php endwhile;
            else : ?>
                
                 <h3>No hay entradas en esta sección</h3>
                 <?php endif ?>
            
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

