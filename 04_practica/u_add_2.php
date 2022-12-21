<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
            font-weight: bold;
        }
        span{
            font-weight: bold;
        }
    </style>
</head>
<body>
    

<?php

    $nombre=trim(strip_tags($_REQUEST["nombre"]));
    $mail=trim(strip_tags($_REQUEST["mail"]));
    $clave=trim(strip_tags($_REQUEST["clave"]));


    /* Comprobar que recoge los datos */
   // echo $nombre. ", ". $mail.", ".$clave;

    /* Conectar con la base de datos */

    $conexion=mysqli_connect("localhost","root","rootroot") or die ("No se puede conectar a la base de datos");


     /* Selecionamos la base de datos */

     mysqli_select_db($conexion,"inmobiliaria") or die ("No se puede selecionar la base de datos");

     /* query */

    $query="insert into usuario (nombre,correo,clave) values ('$nombre','$mail','$clave')";

    /* Ejecutamos la query y control de error */

    if(mysqli_query($conexion,$query)){
        echo "<span>Usuario " .$nombre. ", añadido.</span> ";
        print "<br><a href='u_add.php'><button>Volver Usuario</button></a>";
       
    }
    else{
        echo "<span>Error</span>" .$query. "<br>" .mysqli_error($conexion);
        print "<br><a href='u_add.php'><button>Volver Usuario</button></a>";
    } 
    /* Ceramos la conexion */

    mysqli_close($conexion);

?>
</body>
</html>
