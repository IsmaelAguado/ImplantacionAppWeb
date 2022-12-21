<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuario</title>
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
        p{
            font-weight: bold;
            font-size: 25px;
        }
    </style>
</head>

<body>

    <fieldset>

        <legend>Mostrar Usuario</legend>


        <form action="u_listar_2.php">

           <p>Usuarios de la Inmobiliaria</p>

            <input class='margin' type="submit" value="Mostrar">
           


        </form>
        <br><a href="usuario.php"><button>Volver Usuario</button></a>
    </fieldset>

</body>

</html>