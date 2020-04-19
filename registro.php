<?php 
   
    require('includes/coneccion.php');
    
   

    if (isset($_POST["registro"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && 
        !empty($_POST["email"]) && !empty($_POST["passw"])
    ) {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $contrasena=$_POST["passw"];
        

        $errores=array();
        if (!is_string($nombre) || preg_match("/[0-9]/",$nombre)  ) {
            $errores['nombre']='nombre invalido';
        }
        if (!is_string($apellido) || preg_match("/[0-9]/",$apellido) ) {
            $errores['apellido']='apellido invalido';
        }
        if (!is_string($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $errores=$_POST['email']='email invalido';
        }
        if ( strlen($_POST["passw"])<5) {//strleng calcula el tamaño 
            $errores['passw']='contraseña muy corta';
        }     



        
        
        if (!empty($errores) ) {
            $_SESSION['errores']= $errores;
            header('location: index.php');
            
        }else {
            //cifrar contraseña
            
            $passwordSegura=password_hash($contrasena,PASSWORD_BCRYPT,['cost'=>4]);//encriptar
          
            //guardar valores
       

            $consulta="INSERT INTO usuarios VALUES(null,'$nombre','$apellido','$email','$passwordSegura',CURDATE()) ";
            $insert=mysqli_query($coneccion,$consulta);
            
           
            if ($insert) {
                $_SESSION['completado']='registro satisfactorio';
                header('location: index.php');
            }else {
                if ($error=mysqli_errno($coneccion)){
                                      
                    if ($error==1062) {
                        $_SESSION['errores']['generales']='correo electronico usado';
                        var_dump($_SESSION['errores']['generales']='correo electronico usado');
                        
                    }else {
                    $_SESSION['errores']['generales']='registro incorrecto';
                }
                   
                   
                }
               
            }
          
            header('location: index.php');


        }
    }else {
        $errores['faltan']='faltan valores';
        $_SESSION['errores']= $errores;
        header('location: index.php');
    }

?>