<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
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
        .borde{
            background-color: lightgray;
            border: 2px solid blue;
            margin-bottom: 20px;
            padding: 2px;
            text-align: center;
        }
        table{
            margin-bottom: 20px;
        }
        span{
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php

$nombre=trim(strip_tags($_REQUEST["nombre"]));
$correo=trim(strip_tags($_REQUEST["correo"]));


/* Comprobar que recoge los datos */
//echo $nombre." ".$correo;

/* Conectar con la base de datos */

$conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


/* Selecionamos la base de datos */

mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

/* query */

$query = "select usuario_id,nombre,correo,clave from usuario where nombre='$nombre' or correo='$correo'";

/* Ejecutamos la query y control de error */

$listar = mysqli_query($conexion, $query);

/* Si el resultado es mayor a 0 entra */

if (mysqli_num_rows($listar) > 0) 
{
 // Muestra los datos de la fila buscada
 $row = mysqli_fetch_assoc($listar);   
  
    echo "<fieldset>";

    echo "<legend>Modificar Usuario</legend>";
    echo "<form action='u_modificar_3.php' method='get'>";
    echo    "<table>  
            <tr>
                <td>El Usuario ID:</td>
                <td><input type='text' name='usuario_id' value=".$row['usuario_id']."></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type='text' name='nombre' value=".$row['nombre']."></td>
            </tr>
            <tr>
                <td>Correo:</td>
                <td><input type='text' name='correo' value=".$row['correo']."></td>
            </tr>
            <tr>
                <td>Clave:</td>
                <td><input type='password' name='clave' value=".$row['clave']." readonly></td>
            </tr>  
            
        </table>";  
    echo "<br>";
    echo " <input type='submit' value='Enviar'>";
    echo " <input type='reset' value='Borrar'>";
    echo "</form>";
    echo "<br>";
    echo "<a href='usuario.php'><button>Volver Usuario</button></a>";  
    echo "</fieldset>"; 
} else {
    echo "<span>No existe ese Usuario</span>";
    echo "<br>";
    echo "<a href='usuario.php'><button>Volver Usuario</button></a>";
}

/* Cerramos la conexion */

mysqli_close($conexion);
?>
</body>
</html>

