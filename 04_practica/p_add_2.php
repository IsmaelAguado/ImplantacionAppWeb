<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
    <style>
        body{
            background-image: url('./img_casas/9.jpg');
            background-repeat: no-repeat;
            background-size:auto;
        }
         span{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php

    $idpiso = trim(strip_tags($_REQUEST["codigo_piso"]));
    $calle = trim(strip_tags($_REQUEST["calle"]));
    $numero = trim(strip_tags($_REQUEST["numero"]));
    $piso = trim(strip_tags($_REQUEST["piso"]));
    $puerta = trim(strip_tags($_REQUEST["puerta"]));
    $cp = trim(strip_tags($_REQUEST["cp"]));
    $metros = trim(strip_tags($_REQUEST["metros"]));
    $zona = trim(strip_tags($_REQUEST["zona"]));
    $precio = trim(strip_tags($_REQUEST["precio"]));
    $imagen = $_FILES["imagen"];
    $usuario_id = trim(strip_tags($_REQUEST["usuario_id"]));



    /* Comprobar que recoge los datos y se han introducido los datos */

    // $error = "";
    // if ($idpiso == "") {
    //     $error = $error . "<li>Introduce una ID Piso</li>";
    // }
    // if ($calle == "") {
    //     $error = $error . "<li>Introduce una calle</li>";
    // }
    // if ($numero == "") {
    //     $error = $error . "<li>Introduce un número</li>";
    // }
    // if ($piso == "") {
    //     $error = $error . "<li>Introduce un número</li>";
    // }
    // if ($puerta == "") {
    //     $error = $error . "<li>Introduce letra o nímero de puerta</li>";
    // }
    // if ($cp == "") {
    //     $error = $error . "<li>Introduce un Código Postal</li>";
    // }
    // if ($metros == "") {
    //     $error = $error . "<li>Introduce los metros</li>";
    // }
    // if ($precio == "") {
    //     $error = $error . "<li>Introduce un precio</li>";
    // }

    // Subir fichero con la foto de la vivienda

    $copiarFichero = false;

    // Copiar fichero en directorio de ficheros subidos

    // Se renombra para evitar que sobreescriba un fichero existente
    // Para garantizar la unicidad del nombre se añade una marca de tiempo

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $nombreDirectorio = "C:\AppServ/www/php_ejercicios/04_practica/img/";
        $nombreFichero = $_FILES['imagen']['name'];
        $copiarFichero = true;

        // Si ya existe un fichero con el mismo nombre, renombrarlo

        $nombreCompleto = $nombreDirectorio . $nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
        }
    }

    // El fichero introducido supera el límite de tamaño permitido


    //ESTO ERA LO QUE HACÍA QUE EL CODIGO NO FUNCIONARA
    // if ($_FILES['imagen']['error'] == UPLOAD_ERR_FORM_SIZE) {
    //     $maxsize = $_REQUEST['MAX_FILE_SIZE'];
    //     $error = $error . "   <li>El tamaño del fichero supera el límite permitido ($maxsize bytes)</li>\n";
    // }

    // No se ha introducido ningún fichero

    else if ($_FILES['imagen']['name'] == ""){
        $nombreFichero = '';
    }

    // El fichero introducido no se ha podido subir
    
    else{
        $error = $error . "   <li>No se ha podido subir el fichero</li>";
    }
    // Mostrar errores encontrados

    if ($error != "") {
        echo "<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>\n";
        echo "<UL>\n";
        echo $error;
        echo "</UL>\n";
        echo "<br><a href='p_add.php'>Volver Añadir</a>";
    }

    // Mover foto a su ubicación definitiva e introducir el archivo en la base de datos.

         if ($copiarFichero){
            move_uploaded_file ($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }
  



    /* Conectar con la base de datos */

    $conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


    /* Selecionamos la base de datos */

    mysqli_select_db($conexion, "inmobiliaria") or die("No se puede selecionar la base de datos");

    /* query */

    $query = "insert into pisos (codigo_piso,calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id) values ('$idpiso','$calle','$numero','$piso','$puerta','$cp','$metros','$zona','$precio','$nombreFichero','$usuario_id');";

    /* Ejecutamos la query y control de error */

    if (mysqli_query($conexion, $query)) {
        echo "<span>Piso $idpiso añadido</span> ";
        print "<br><a href='p_add.php'><button>Volver Pisos</button></a>";
    } else {
        echo "<span>Error" . $query . "<br>" . mysqli_error($conexion)."</span>";
        print "<br><a href='p_add.php'><button>Volver Pisos</button></a>";
    }
    /* Ceramos la conexion */

    mysqli_close($conexion);

    ?>
</body>

</html>