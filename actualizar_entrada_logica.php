<?php 

require('includes/coneccion.php');
    if(isset($_SESSION['login'])){
        if(isset($_POST['actualizar']) && !empty($_POST['titulo']) && !empty($_POST['descripcion']) ){
            $titulo= $_POST['titulo'];
            $descripcion= $_POST['descripcion'];
            $entrada_id=$_POST['actualizar'];
           
            $usuario_id=$_SESSION['login']['id'];

        
            $errores=array();
                if( !is_string($titulo) || preg_match("/[0-9]/",$titulo) ) {
                    $errores['titulo']='titulo invalido';
                }
                if( !is_string($descripcion) ) {
                    $errores['descripcion']='descripcion invalido';
                }
             

                if (!empty($errores)) {
                    var_dump($errores);
                    $_SESSION['errores']=$errores;
                  
                    header("location: actualizar_entrada.php?id=$entrada_id");
                    }else {
                    
                    
                        
                        

                            $query="UPDATE entradas SET titulo='$titulo', descripcion='$descripcion'
                            WHERE id=$entrada_id && usuario_id=$usuario_id";
                            $update=mysqli_query($coneccion,$query);

                            if ($update) {
                                echo 'datos actualizados';
                              
                                $_SESSION['completado']='datos actualizados';

                            }else {
                                $errores['registro']='error al actualizar';
                                 $_SESSION['errores']=$errores;
                            }
                            header("location: actualizar_entrada.php?id=$entrada_id");

                            
                    
                        //coneccion


                }
        }else {
            $errores['faltan_datos']='faltan datos';
            $_SESSION['errores']=$errores;
            
            header("location: actualizar_entrada.php?id=$entrada_id");
        }


    }else {
       header("location: index.php");
    }

?>