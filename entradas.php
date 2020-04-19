<?php
    require('includes/cabecera.php');
?>
    <section class="cuerpo">
        

        
        <section class="contenido"> 
            

            <?php $result=mostrar_entrada($coneccion,$_GET['id']);
              if(!empty($result)): 
            $entrada=mysqli_fetch_assoc($result);
            
          
            ?>
           

             <article class="entrada">
             <h2 ><?=$entrada['titulo'] ?>  </h2>
                 <a href="categorias.php?id=<?=$entrada['cid']?> ">
                    <h3><?=$entrada['cnombre']?></h3> 
                </a>
                <p class="info"><?= $entrada['unombre'] . ' | ' .  $entrada['fecha'] ?></p>
                <p class="descripcion"><?=$entrada['descripcion'] ?></p> 
                

                <?php
                if ( !empty($_SESSION['login']) && $entrada['usuario_id'] == $_SESSION['login']['id'] ): ?>
                <form action="eliminar_entrada.php" method="post">
               <button type="submit" class="b-eliminar " name="eliminar" value="<?=$entrada['id']?>">Eliminar</button>
                
                
               <a type="submit" class="b-eliminar " name="actualizar" href="actualizar_entrada.php?id=<?=$entrada['id']?>">Actualizar</a>
               
                </form>
               <?php endif;
               endif?>
               
            </article>
           
             
        
        </section>
       <?php 
       require('includes/aside.php');
       !empty($_SESSION['errores']) ? borrar_errores() : ''?>
       
   
        
<!-- 4-->
    </section>
    <footer>

    </footer>
</body>
</html>

