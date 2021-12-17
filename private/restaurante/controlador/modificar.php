<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 //Modificar Datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $codPer= $_POST["codPer"];
 $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
 $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null;
 $precio = isset($_POST["precio"]) ? mb_strtoupper(trim($_POST["precio"]), 'UTF-8') : null;
 $img = isset($_POST["img"]) ? mb_strtoupper(trim($_POST["img"]), 'UTF-8') : null;
 
 $sql = "UPDATE productos " .
 "SET pro_nombre = '$nombre', " .
 "pro_descripcion = '$descripcion', " .
 "pro_precio = '$precio', " .
 "img = '$img' " .
 
 "WHERE pro_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";

 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }
 header("Location: ../vista/index.php?codigo=$codPer");
 $conn->close();
?>
</body>
</html>