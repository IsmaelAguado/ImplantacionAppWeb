<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario</title>
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
    input{
        size: 40px;
        font-weight: bold;
    }
    td{
        font-weight: bold;
    }
    .margin{
        margin-top: 10px;;
    }

    </style>
</head>

<body>

    <fieldset>

    <legend>Añadir Usuario</legend>


        <form action="u_add_2.php">

            <table>
                <tr>
                    <td>Nombre:</td><td><input type="text" name="nombre" id=""></td>
                </tr> 
                <tr>
                    <td>Mail:</td><td><input type="text" name="mail" id=""></td>
                </tr> 
                <tr>
                    <td>Clave:</td><td><input type="text" name="clave" id=""></td>
                </tr> 

            </table>

            <input class='margin' type="submit" value="Enviar">
            <input class='margin'type="reset" value="Borrar">
            
          
        </form>
        
        <br>
        <a href="usuario.php"><button>Volver Usuario</button></a>
    </fieldset>

</body>

</html>