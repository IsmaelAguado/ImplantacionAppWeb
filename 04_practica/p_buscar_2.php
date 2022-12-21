<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Pisos</title>
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

        table {
            border: solid 2px blue;
        }

        .borde {
            background-color: lightgray;
            border: 2px solid blue;
            margin-bottom: 20px;
            padding: 2px;
            text-align: center;
        }

        button {
            margin-top: 10px;
            font-weight: bold;
        }

        span {
            font-weight: bold;
        }
        img{
            width: 100px;
            height: 100px;
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
// echo $

/* Conectar con la base de datos */

$conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


/* Selecionamos la base de datos */

mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

/* query */

$query = "select * from pisos where Codigo_piso='$idpiso' or calle='$calle' or zona='$zona'";


/* $query = "select Codigo_piso,calle,numero,puerta,cp,metros,zona,precio,imagen,usuario_id from pisos where Codigo_piso='$idpiso' or calle='$calle' or numero='$numero' or puerta='$puerta' or cp='cp' or metros='$metros' or zona='$zona' or precio='$precio' or imagen='$imagen' or usuario_id='$usuario_id' ";
 */

/* Ejecutamos la query y control de error */

$buscar = mysqli_query($conexion, $query);

/* Si el resultado es mayor a 0 entra */

if (mysqli_num_rows($buscar) >0) {   
    echo "<table class='borde'>";
    echo "<tr class='borde'>
            <td class='borde'>Codigo Piso</td>
            <td class='borde'>Calle</td>
            <td class='borde'>Número</td>
            <td class='borde'>Piso</td>
            <td class='borde'>Puerta</td>
            <td class='borde'>C. Postal</td>
            <td class='borde'>Metros</td>
            <td class='borde'>Zona</td>
            <td class='borde'>Precio</td>
            <td class='borde'>Imagen</td>
            <td class='borde'>Usuario ID</td>
        </tr>";
        
    while ($row = mysqli_fetch_assoc($buscar)) {
       
        echo "<tr>
        <td class='borde'>".$row['Codigo_piso']."</td>
        <td class='borde'>".$row['calle']."</td>
        <td class='borde'>".$row['numero']."</td>
        <td class='borde'>".$row['piso']."</td>
        <td class='borde'>".$row['puerta']."</td>
        <td class='borde'>".$row['cp']."</td>
        <td class='borde'>".$row['metros']."</td>
        <td class='borde'>".$row['zona']."</td>
        <td class='borde'>".$row['precio']."</td>
        <td class='borde'><img src='img/".$row['imagen']."'></td>
        <td class='borde'>".$row['usuario_id']."</td>
        </tr>";
        
    }
    echo "</table>";
    print "<br><a href='p_buscar.php'><button>Volver Pisos</button></a>";
} else {
    echo "<span>No hay datos del piso</span>";
    print "<br><br><a href='p_buscar.php'><button>Volver pisos</button></a>";
}


/* Cerramos la conexion */

mysqli_close($conexion);

?>


</body>

</html>