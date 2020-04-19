<?php 

require('includes/coneccion.php');
    if(isset($_SESSION['login'])){
        if(isset($_POST['actualizar']) && !empty($_POST['nombre']) && !empty($_POST['apellido'] && !empty($_POST['email']))){
            $nombre= $_POST['nombre'];
            $apellido= $_POST['apellido'];
            $email=$_POST['email'];
            $usuario_id=$_SESSION['login']['id'];

            $errores=array();
                if( !is_string($nombre) || preg_match("/[0-9]/",$nombre) ) {
                    $errores['nombre']='nombre invalido';
                }
                if( !is_string($apellido) || preg_match("/[0-9]/",$apellido) ) {
                    $errores['apellido']='apellido invalido';
                }
                if( !is_string($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                    $errores['email']='email invalido';
                }

                if (!empty($errores)) {
                    var_dump($errores);
                    $_SESSION['errores']=$errores;
                    header('location: actualizar_usuario.php');
                    }else {
                    
                    //comprobar si el email esta disponible o es el mismo
                        $queryE="SELECT * FROM usuarios WHERE email='$email'";
                        $resut_usuario_email=mysqli_query($coneccion,$queryE);
                        $usuario_email= mysqli_fetch_assoc($resut_usuario_email);
                       
                    if ($usuario_email==null || $usuario_email['id']==$usuario_id  ) {
                        

                            $query="UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email'
                            WHERE id=$usuario_id";
                            $update=mysqli_query($coneccion,$query);

                            if ($update) {
                                echo 'datos actualizados';
                                $_SESSION['login']['nombre']=$nombre;
                                $_SESSION['login']['apellido']=$apellido;
                                $_SESSION['login']['email']=$email;

                                $_SESSION['completado']='datos actualizados';

                            }else {
                                $errores['registro']='error al actualizar';
                            }$_SESSION['errores']=$errores;
                           
                            header('location: actualizar_usuario.php');

                    }else {
                        $errores['email']='email existente';
                        $_SESSION['errores']=$errores;
                         header('location: actualizar_usuario.php');
                    }
                    
                        //coneccion


                }
        }else {
            $errores['faltan_datos']='faltan datos';
            $_SESSION['errores']=$errores;
          
            header('location: actualizar_usuario.php');
        }


    }else {
       header('location: index.php');
    }

?>