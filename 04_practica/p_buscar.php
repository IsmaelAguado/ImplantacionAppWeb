<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Piso</title>
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
    </style>
</head>

<body>

    <fieldset>

        <legend>Buscar Piso</legend>

        <form action="p_buscar_2.php">

        <table>
                <tr>
                    <td>Código Piso:</td><td><input type="number" name="Codigo_piso" id=""></td>
                </tr> 
                <tr>
                    <td>Calle:</td><td><input type="text" name="calle" id=""></td>
                </tr> 
                <!-- <tr>
                    <td>Número:</td><td><input type="number" name="numero" id=""></td>
                </tr> 
                <tr>
                    <td>Piso:</td><td><input type="number" name="piso" id=""></td>
                </tr> 
                <tr>
                    <td>Puerta:</td><td><input type="text" name="puerta" id=""></td>
                </tr> 
                <tr>
                    <td>C.P.:</td><td><input type="number" name="cp" id=""></td>
                </tr> 
                <tr>
                    <td>Metros:</td><td><input type="number" name="metros" id=""></td>
                </tr>  -->
                <tr>
                    <td>Zona:</td><td><input type="text" name="zona" id=""></td>
                </tr> 
                <!-- <tr>
                    <td>Precio:</td><td><input type="float" name="precio" id=""></td>
                </tr> 
                <tr>
                    <td>Imagen:</td><td><input type="text" name="imagen" id=""></td>
                </tr> 
                <tr>
                    <td>Usuario ID:</td><td><input type="number" name="usuario_id" id=""></td>
                </tr> -->
        </table>

            <input class='margin' type="submit" value="Enviar">
            <input class='margin' type="reset" value="Borrar">


        </form>

        <br>
        <a href="pisos.php"><button>Volver Pisos</button></a>
    </fieldset>

</body>

</html>