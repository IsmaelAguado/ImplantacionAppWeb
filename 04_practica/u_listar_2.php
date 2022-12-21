<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <style>
        body{
            background-image: url('./img_casas/9.jpg');
            background-repeat: no-repeat;
            background-size:auto;
        }
        td {
            font-weight: bold;
            border: solid 2px blue;
            
        }
        table{            
            border: solid 2px blue;
        }
        .borde{
            background-color: lightgray;
            border: 2px solid blue;
            margin-bottom: 20px;
            padding: 2px;
            text-align: center;
        }
        button{
            margin-top: 10px;
        }
        span{
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
    /* Comprobar que recoge los datos */
    //echo $nombre." ".$correo;

    /* Conectar con la base de datos */

    $conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


    /* Selecionamos la base de datos */

    mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

    /* query */

    $query = "select usuario_id,nombre,correo,clave from usuario";

    /* Ejecutamos la query y control de error */

    $listar = mysqli_query($conexion, $query);
        
    /* Mostrar la tabla en pantalla de los usuarios. */
        $nfilas=mysqli_num_rows($listar);
        if($nfilas >= 1){

        echo "<table class='borde'>";
        echo "<tr class='borde'><td class='borde'>Usuario ID</td><td class='borde'>Nombre</td><td class='borde'>Correo</td></tr>";
        
        for($i=0; $i<$nfilas; $i++){
            $row=mysqli_fetch_assoc($listar);
            echo "<tr><td class='borde'>".$row['usuario_id']."</td><td class='borde'>".$row['nombre']."</td><td class='borde'>".$row['correo']."</td></tr>";
        }
        echo "</table>";
        echo "<br><a href='u_listar.php'><button><b>Volver Listar</b></button></a>";
    }
    else{
        echo "<span>No hay usuarios en la base de datos</span>";
        echo "<br><a href='u_listar.php'><button><b>Volver Listar</b></button></a>";
    }
    /* Cerramos la conexion */

    mysqli_close($conexion);


    ?>
</body>
</html>

