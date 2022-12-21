<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Piso</title>
    <style>
        body{
            background-image: url('./img_casas/9.jpg');
            background-repeat: no-repeat;
            background-size:auto;
        }
        fieldset {
            background-color: lightgray;
            border: 2px solid blue;
        }

        legend {
            border: solid 2px blue;
            background-color: lightblue;
            color: black;
            font-weight: bold;
        }

        button {
            margin-top: 5px;
            font-weight: bold;

        }

        input {
            size: 40px;
            font-weight: bold;
        }

        td {
            font-weight: bold;

        }

        .margin {
            margin-top: 10px;
            ;
        }

        .borde {
            background-color: lightgray;
            border: 2px solid blue;
            margin-bottom: 20px;
            padding: 2px;
            text-align: center;
        }

        table {
            margin-bottom: 20px;
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
    $piso = trim(strip_tags($_REQUEST["piso"]));
    $numero = trim(strip_tags($_REQUEST["numero"]));
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

    $query = "select Codigo_piso,calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id from pisos where Codigo_piso='$idpiso';";

    /* Ejecutamos la query y control de error */

    $listar = mysqli_query($conexion, $query);

    /* Si el resultado es mayor a 0 entra */

    if (mysqli_num_rows($listar) > 0) {
        // Muestra los datos de la fila buscada
        $row = mysqli_fetch_assoc($listar);

        echo "<fieldset>";

        echo "<legend>Modificar Usuario</legend>";
        echo "<form action='p_modificar_3.php' enctype='multipart/form-data' method='get'>";
        echo    "<table>  
        <tr>
            <td>Código Piso:</td>
            <td ><input type='number' name='Codigo_piso' value=" . $row['Codigo_piso'] . "></td>
        </tr>
        <tr>
            <td>Calle:</td>
            <td ><input type='text' name='calle' value=" . $row['calle'] . "></td>
        </tr>
        <tr>
            <td>Número Piso</td>
            <td ><input type='number' name='numero' value=" . $row['numero'] . "></td>
        </tr>
        <tr> 
            <td>Piso:</td>
            <td><input type='number' name='piso' value=" . $row['piso'] . "></td>
        </tr>
        <tr>
            <td>Puerta:</td>
            <td><input type='text' name='puerta' value=" . $row['puerta'] . "></td>
        </tr>
        <tr>
            <td>C.Postal:</td>
            <td><input type='number' name='cp' value=" . $row['cp'] . "></td>
        </tr>
        <tr>
            <td>Metros:</td>
            <td><input type='number' name='metros' value=" . $row['metros'] . "></td>
        </tr>
        <tr>
            <td>Zona:</td>
            <td><input type='text' name='zona' value=" . $row['zona'] . "></td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td><input type='float' name='precio' value=" . $row['precio'] . "></td>
        </tr>
        
        
        <tr>
            <td>Usuario ID:</td>
            <td><input type='number' name='usuario_id' value=" . $row['usuario_id'] . "></td>
        </tr>
           
        </table>";
        
        echo "<br>";
        echo " <input type='submit' value='Enviar'>";
        echo " <input type='reset' value='Borrar'>";
        echo "</form>";
        echo "<br>";
        echo "<a href='pisos.php'><button>Volver Pisos</button></a>";
        echo "</fieldset>";
    } else {
        echo "<span>No existe ese Piso</span>";
        echo "<br>";
        echo "<a href='pisos.php'><button>Volver Pisos</button></a>";
    }

    /* Cerramos la conexion */

    mysqli_close($conexion);

    ?>
</body>

</html>