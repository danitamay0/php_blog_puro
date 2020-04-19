
<aside>
         
  <section class="login">
  <h3>buscar</h3>
    <form action="busqueda.php" class="buscar" method="post">
                        
                        
                        <input type="text" name="titulo" placeholder="titulo a buscar" required>
                        
      
                        <button type="submit" name="buscar">Buscar</button>
                      
                        </form>




          <?php if(isset($_SESSION['login'])): ?>
                
              
                <section class="interior">
                  <h1> bienvenido <?=$_SESSION['login']['nombre'] . ' ' . $_SESSION['login']['apellido'] ?> </h1>
                
                 <a class="b-crear b" href='crear_entradas.php'>Crear entradas</a>
                 <a class="b-crear-c b" href='crear_categoria.php'>Crear categorias</a>
                 <a class="b-datos b" href='actualizar_usuario.php'>Mis datos</a>
                 <a class="b-cerrar b" href='cerrar_sesion.php'>Cerrar sesion</a>
               
               
             
                
              
              </section>

             <?php endif ?> 


            
            
                 

            <?php if(!isset($_SESSION['login'])): ?>
              
                <section class="contenido_login" >  

               

                <form action="login.php" method="post">
                  <h3>identificate</h3>
                   <?php echo isset($_SESSION['error_login']) ? error_login($_SESSION['error_login']) :'' ?>
                  <input type="email" name="email" placeholder="correo" required>
                  
                  <input type="password" name="passw" placeholder="password" required>
                  <button type="submit" name="login">entrar</button>
                 
                  </form>
                 
               
              
              

                                  <form action="registro.php" method="post">
                                          <?php echo isset($_SESSION['completado']) ? registro_ok() :'' ?>
                                          <?php echo isset($_SESSION['errores']['generales']) ? error_db() :'' ?>

                                          <h3>registrate</h3>
                                          <input type="text" name="nombre" placeholder="nombre" required pattern="[a-zA-Z]+">
                                          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'nombre') : ''; ?>
                                          <input type="text" name="apellido" placeholder="apellido" required pattern="[a-zA-Z]+">
                                          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'apellido') : ''; ?>
                                          <input type="email" name="email" placeholder="email" required>
                                          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'email') : ''; ?>
                                          <input type="password" name="passw" placeholder="password"  minlength="5" required>
                                          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'passw') : ''; ?>
                                          <button type="submit" name="registro">Registro</button>
                
              </section>
               
              <?php !empty($_SESSION['errores']) ? borrar_errores() : ''?>
              <?php !empty($_SESSION['completado']) ? borrar_errores() : ''?>
              <?php !empty($_SESSION['error_login']) ? borrar_errores() : ''?>
            <?php endif ?>
           
  </section>                   
 </aside>


 
