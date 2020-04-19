<?php 
    require('includes/coneccion.php');
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $passw=$_POST['passw'];

        $query="SELECT * FROM usuarios WHERE email ='$email'";
        $resultado=mysqli_query($coneccion,$query);
       
        if($resultado && mysqli_num_rows($resultado)==1){
            $usuario=mysqli_fetch_assoc($resultado);
          
             $verify_passw=password_verify($passw,$usuario['passw']);
             if($verify_passw){
                 $_SESSION['login']=$usuario;
                 $_SESSION['error_login']=null;
                 unset($_SESSION['error_login']);
                               
             }else{
                 $_SESSION['error_login']='contraseña incorrecta';
             }

        }else{
            $_SESSION['error_login']='error de email';
        }
    }

    header('location: index.php');
?>