<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            font-weight: bold;
        }
        span{
            font-weight: bold;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php

$id=trim(strip_tags($_REQUEST["usuario_id"]));
$nombre=trim(strip_tags($_REQUEST["nombre"]));
$correo=trim(strip_tags($_REQUEST["correo"]));
$clave=trim(strip_tags($_REQUEST["clave"]));


/* Comprobar que recoge los datos */
//echo $nombre." ".$correo;

/* Conectar con la base de datos */

$conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


/* Selecionamos la base de datos */

mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

/* query */

$query = "update usuario set usuario_id='$id',nombre='$nombre', correo='$correo', clave='$clave'where nombre='$nombre' or correo='$correo'";

/* Ejecutamos la query y control de error */
if(mysqli_query($conexion, $query)){
    echo "<span> Se ha actualizado correctamente los datos del usuario ".$nombre."</span>";
    echo "<br><br><a href='u_modificar.php'><button>Volver</button></a>";
    }
else{
    echo "<span>Error en los datos introducidos</span>";
    echo "<br><br><a href='u_modificar.php'><button>Volver</button></a>";
}

/* Cerramos la conexion */

mysqli_close($conexion);
?>