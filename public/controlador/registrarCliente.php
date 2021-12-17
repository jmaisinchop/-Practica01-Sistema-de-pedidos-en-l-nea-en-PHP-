<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    $link = mysqli_connect("localhost","root","");
     if($link){
         mysqli_select_db($link, "pedidosOnline");
         mysqli_select_db($link, "SET NAMES 'utf8'");


     }
    
     $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
     $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
     $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
     $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
     $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
     $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
     $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
     $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : null;
     $sql = "INSERT INTO usuarios VALUES (0, '$correo',MD5('$contrasena'), '$rol')";
     $ejecutar_insertar_sql=mysqli_query($link, $sql);


    $uId= mysqli_insert_id($link);
    echo "<p>Se ha creado los datos personales correctamemte!!! ".$uId." </p>";

    $sql2 = "INSERT INTO clientes VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$uId')";
    $ejecutar_insertar_sql2=mysqli_query($link, $sql2);
      

         if( $ejecutar_insertar_sql==TRUE && $ejecutar_insertar_sql2 === TRUE){
                $uId= mysqli_insert_id($link);
                echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
                header("Location: ../vista/login.php");
            
           
           
        }else {
            if ($link->errno == 1062) {
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
              
            } else {
                echo "<p class='error'>Error: " . mysqli_error($link) . "</p>";
              
            }
        }
     
    //cerrar la base de datoss
    $link->close();
   
  

    ?>
</body>

</html>

