<?php
    
    require('includes/coneccion.php');
    require('includes/helpers.php');
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h2 class="logo">Blog de Video Juegos</h2>
        <nav>

            

            <ul>
                <li>
                    <a href="index.php">inicio </a>
                </li>
                <?php
                    $categorias=mostrar_categoria($coneccion, false);
                    if(!empty($categorias)): 
                    while($categorias && $cateria = mysqli_fetch_assoc($categorias)) : ?>
                        <li>
                         <a href="categorias.php?id=<?=$cateria['id'] ?>"><?=$cateria['nombre']?></a>
                         </li> 
                    
                <?php endwhile;
                endif ?>

                <li>
                    <a href="#">sobre nosotros</a>
                </li>    
                <li>
                    <a href="#">contacto</a>
                </li>      
                 
            </ul>
        </nav>
    </header>