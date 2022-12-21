<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
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
            margin-bottom: 5px;
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
    </style>
</head>

<body>


    <?php

    $nombre = trim(strip_tags($_REQUEST["nombre"]));
    $mail = trim(strip_tags($_REQUEST["mail"]));
    $id = trim(strip_tags($_REQUEST["usuario_id"]));


    /* Comprobar que recoge los datos */
    // echo $nombre. ", ". $mail.", ".$clave;

    /* Conectar con la base de datos */

    $conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


    /* Selecionamos la base de datos */

    mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

    /* query */

    $query = "select * from usuario where usuario_id='$id' or nombre='$nombre' or correo='$mail'";


    /* Ejecutamos la query y control de error */

    $buscar = mysqli_query($conexion, $query);

    /* Si el resultado es mayor a 0 entra */

    if (mysqli_num_rows($buscar) > 0) {
        echo "<table class='borde'>";
        echo "<tr class='borde'>
        <td class='borde'>Usuario ID</td>
        <td class='borde'>Nombre</td>
        <td class='borde'>Correo</td>
        </tr>";
        while ($row = mysqli_fetch_assoc($buscar)) {

            echo "<tr><td class='borde'>" . $row['usuario_id'] . "</td><td class='borde'>" . $row['nombre'] . "</td><td class='borde'>" . $row['correo'] . "</td></tr>";
            echo "</table>";
        }
        print "<br><a href='u_buscar.php'><button>Volver Usuario</button></a>";
    } else {
        echo "<span>No hay datos del usuario</span>";
        print "<br><br><a href='u_buscar.php'><button>Volver Usuario</button></a>";
    }


    /* Cerramos la conexion */

    mysqli_close($conexion);
    ?>


</body>

</html>