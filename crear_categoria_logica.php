
<?php 
    require('includes/coneccion.php');
    
    if(isset($_POST['categoria'])){
        $nueva_categoria=$_POST['categoria'];
        $query="INSERT INTO categorias VALUES(null,'$nueva_categoria')";
        $insert=mysqli_query($coneccion,$query);
    
        
        if($insert ){
                header('location: index.php');
        }else{
            $_SESSION['errores']['categoria_existente']='la categoria ya existe';
            header('location: crear_categoria.php');
        }
        
    }
?>