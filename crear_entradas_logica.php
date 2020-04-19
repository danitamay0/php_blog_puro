<?php 
    require('includes/cabecera.php');
 
    if(isset($_POST['send_entrada'])){
        $errores=array();
        if(!empty($_POST['titulo']) && is_string($_POST['titulo'])){
            $titulo=$_POST['titulo'];
        }else {
            $errores['titulo']='error de titulo';
        }

        if(!empty($_POST['descripcion']) && is_string($_POST['descripcion'])){
            $descripcion=$_POST['descripcion'];
        }else {
            $errores['descripcion']='error de descripcion';
        }
       
       
        $categoria_id=$_POST['categorias'];


        if(!empty($_SESSION['login']['id'])){
            $usuario_id=$_SESSION['login']['id'];
        }else {
            $errores['login']='error de usuario';
        }
       
        if(!empty($errores)){
            $_SESSION['errores']= $errores;
            header('location: crear_entradas.php');
        }else {
            $query= "INSERT INTO entradas VALUES(null,$usuario_id,$categoria_id,'$titulo','$descripcion',CURDATE())";


            $insert=mysqli_query($coneccion,$query);
            if($insert){
                echo 'exitoso';
                header('location: index.php');
            }else{
             $_SESSION['errores']['generales']='entrada incorrecta';
                var_dump(mysqli_error($coneccion));
            }
        }
      
    }
    
?>
