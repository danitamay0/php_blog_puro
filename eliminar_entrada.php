<?php 
    require('includes/coneccion.php');
    if(isset($_POST['eliminar']) && !empty($_POST['eliminar'])){
        $entrada_id=$_POST['eliminar'];
        $sql="DELETE FROM entradas WHERE id=$entrada_id";        
        $resultado=mysqli_query($coneccion,$sql);

        if($resultado){
            header('location: index.php');
        }
    }
?>