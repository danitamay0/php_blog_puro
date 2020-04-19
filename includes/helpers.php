<?php
  function  mostrar_errores($errores,$campo){
        $alerta='';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alerta='<div class="alerta_error">' . $errores[$campo] . '</div>';
        }
        return $alerta;
    }
    
  function  borrar_errores(){
        $_SESSION['errores']=null;
        unset($_SESSION['errores']);
        $_SESSION['completado']=null;
        unset($_SESSION['completado']);
        
        $_SESSION['error_login']=null;
        unset($_SESSION['error_login']);
    }

   function registro_ok(){
    $alerta='';
    if (isset( $_SESSION['completado'])) {
        $alerta='<div class="completado">' .  $_SESSION['completado'] . '</div>';
    }
       return $alerta;
   } 

  
   
    function error_db(){
       $alerta='';

       if (isset( $_SESSION['errores']['generales'])) {
        $alerta='<div class="alerta_error">' .  $_SESSION['errores']['generales'] . '</div>';
        }
       return $alerta;
   
    } 

    function error_login(){
        $alerta='';

        if (isset( $_SESSION['error_login'])) {
            $alerta='<div class="alerta_error">' .  $_SESSION['error_login'] . '</div>';
            }
           return $alerta;
    }


    function mostrar_categoria($coneccion, $id=null){
        
        $query="SELECT * FROM categorias ";
        if($id) {
           $query.="WHERE id=$id";
         }

         $query.=" ORDER BY id ASC";

        $categorias=mysqli_query($coneccion,$query);
        $resultado=array();
        if($categorias && mysqli_num_rows($categorias)>=1){
            $resultado=$categorias;
        }

        return $resultado;
        
    }

    function mostrar_entradas($coneccion,$limit=null,$titulo=null){
        $query='SELECT e.*,c.id AS cid, c.nombre AS cnombre FROM entradas e
        INNER JOIN categorias c ON e.categoria_id = c.id ';
        
         if($titulo){
             $query.=" WHERE e.titulo LIKE '%$titulo%' ";
        }
        $query.=" ORDER BY e.id DESC  ";

        if ($limit) {
            $query.='LIMIT 4';
        }
       
       
      
        $entradas=mysqli_query($coneccion,$query);
        $resultado=array();

        if($entradas && mysqli_num_rows($entradas)>0){
            $resultado=$entradas;
        }

        return $resultado;        
    }

    function mostrar_entradas_categoria($coneccion,$id_categoria){
        $sql="SELECT e.*, c.id AS cid, c.nombre AS cnombre FROM entradas e
        INNER JOIN categorias c ON e.categoria_id=c.id WHERE e.categoria_id=$id_categoria";

        $resultado=mysqli_query($coneccion,$sql);

        if ($resultado) {
            return $resultado;
        }

    }

    function mostrar_entrada($coneccion,$id){

        $sql="SELECT e.*, c.id AS cid, c.nombre AS cnombre, CONCAT(u.nombre,' ', u.apellido) As  unombre FROM entradas e
        INNER JOIN categorias c ON e.categoria_id=c.id 
        INNER JOIN usuarios u ON e.usuario_id=u.id
        WHERE e.id=$id";

        $resultado=mysqli_query($coneccion,$sql);

        if ($resultado) {
            return $resultado;
        }

    }
    /* */
    
?>