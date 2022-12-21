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
    

<?php

$idpiso = trim(strip_tags($_REQUEST["Codigo_piso"]));
$calle = trim(strip_tags($_REQUEST["calle"]));
$numero = trim(strip_tags($_REQUEST["numero"]));
$piso = trim(strip_tags($_REQUEST["piso"]));
$puerta = trim(strip_tags($_REQUEST["puerta"]));
$cp = trim(strip_tags($_REQUEST["cp"]));
$metros = trim(strip_tags($_REQUEST["metros"]));
$zona = trim(strip_tags($_REQUEST["zona"]));
$precio = trim(strip_tags($_REQUEST["precio"]));
$imagen = trim(strip_tags($_REQUEST["imagen"]));
$usuario_id = trim(strip_tags($_REQUEST["usuario_id"]));


/* Comprobar que recoge los datos */
//echo $nombre." ".$correo;

/* Conectar con la base de datos */

$conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


/* Selecionamos la base de datos */

mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

/* query */

$query = "delete from pisos where Codigo_piso=$idpiso";

/* Ejecutamos la query y control de error */

if(mysqli_query($conexion, $query)){
    echo "<span> Se han borrados los datos del piso.</span>";
    echo "<br><br><a href='p_borrar.php'><button>Volver</button></a>";
    }
else{
    echo "<span>Error al borrar datos.</span>";
    echo "<br><br><a href='p_borrar.php'><button>Volver</button></a>";
}

/* Cerramos la conexion */

mysqli_close($conexion);
?>


</body>
</html>