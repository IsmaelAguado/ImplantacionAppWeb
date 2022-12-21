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
            font-weight: bold;
            margin-bottom: 25px;

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
        img{
            width: 100px;
            height: 100px;
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

    $query = "select Codigo_piso,calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id from pisos";

    /* Ejecutamos la query y control de error */

    $listar = mysqli_query($conexion, $query);

    /* Mostrar la tabla en pantalla de los usuarios. */
    $nfilas = mysqli_num_rows($listar);
    if ($nfilas >= 1) {

        echo "<table class='borde'>";
        echo "<tr class='borde'><td class='borde'>Codigo Piso</td><td class='borde'>Calle</td><td class='borde'>Número</td><td class='borde'>Piso</td><td class='borde'>Puerta</td><td class='borde'>C. Postal</td><td class='borde'>Metros</td><td class='borde'>Zona</td>
        <td class='borde'>Precio</td><td class='borde'>Imagen</td><td class='borde'>Usuario ID</td></tr>";

        for ($i = 0; $i < $nfilas; $i++) {
            $row = mysqli_fetch_assoc($listar);
            echo "<tr><td class='borde'>" . $row['Codigo_piso'] . "</td>
            <td class='borde'>" . $row['calle'] . "</td>
            <td class='borde'>" . $row['numero'] . "</td>
            <td class='borde'>" . $row['piso'] . "</td>
            <td class='borde'>" . $row['puerta'] . "</td>
            <td class='borde'>" . $row['cp'] . "</td>
            <td class='borde'>" . $row['metros'] . "</td>
            <td class='borde'>" . $row['zona'] . "</td>
            <td class='borde'>" . $row['precio'] . "</td>
            <td class='borde'><img src='img/" . $row['imagen'] . "'></td>
            <td class='borde'>" . $row['usuario_id'] . "</td>
            </tr>";
        }
        echo "</table>";
    }

    /* Cerramos la conexion */

    mysqli_close($conexion);


    ?>

    <fieldset>

        <legend>Modificar Piso</legend>


        <form action="p_modificar_2.php" enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td>Código Piso:</td>
                    <td><input type="number" name="Codigo_piso" id=""></td>
                </tr>
                <!-- <tr>
                    <td>Calle:</td>
                    <td><input type="text" name="calle" id=""></td>
                </tr>
                <tr>
                    <td>Número:</td>
                    <td><input type="number" name="numero" id=""></td>
                </tr>
                <tr>
                    <td>Piso:</td>
                    <td><input type="number" name="piso" id=""></td>
                </tr>
                <tr>
                    <td>Puerta:</td>
                    <td><input type="text" name="puerta" id=""></td>
                </tr>
                <tr>
                    <td>C.Postal:</td>
                    <td><input type="number" name="cp" id=""></td>
                </tr>
                <tr>
                    <td>Metros:</td>
                    <td><input type="number" name="metros" id=""></td>
                </tr>
                <tr>
                    <td>Zona:</td>
                    <td><input type="text" name="zona" id=""></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="float" name="precio" id=""></td>
                </tr>
                <tr>
                    <td>Imagen:</td>
                    <td><input type="text" name="imagen" id=""></td>
                </tr>
                <tr>
                    <td>Usuario ID:</td>
                    <td><input type="number" name="usuario_id" id=""></td>
                </tr> -->
            </table>

            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </form>

        <br>
        <a href="pisos.php"><button>Volver Pisos</button></a>
    </fieldset>

</body>

</html>