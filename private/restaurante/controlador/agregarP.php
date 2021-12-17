<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear NUEVO PRODUCTO</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: ../../../public/vista/index.php");
    }
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $sql2 = "SELECT * FROM restaurantes where res_usu_cod= '$codigo'";
    $result = $conn->query($sql2);
    //echo($codigo);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

    $nombre = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $descripcion = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $precio = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $img = isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;
    $sql = "INSERT INTO productos VALUES (0, '$nombre', '$descripcion', '$precio',".$row['res_codigo']. ",'$img')";
    //echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamente!!!</p>";
        echo '<script language="javascript">alert("AGREGADO CORRECTAMENTE");</script>';
        header("Location: ../vista/index.php?codigo=$codigo");
        echo '<script language="javascript">alert("AGREGADO CORRECTAMENTE");</script>';

    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
   }






    //cerrar la base de datos
    $conn->close();
    echo "<a  href='../vista/index.php?codigo=".$codigo."'>Regresar</a>";

    ?>
</body>

</html>