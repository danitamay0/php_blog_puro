<?php
    require('includes/cabecera.php');
?>
    <section class="cuerpo">
        

        
        <section class="contenido">
            <h3 class="ultimas">ultimas entradas</h3>

            <?php $entradas=mostrar_entradas($coneccion,4);
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
            endif?>
        <a href="todas_las_entradas.php"><button>show more</button></a>
        </section>
       <?php 
       require('includes/aside.php');
        
        ?>
        

    </section>
    <footer>

    </footer>
</body>
</html>

