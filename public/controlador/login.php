<?php

 include '../../config/conexionBD.php';
 session_start();
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT * FROM usuarios WHERE usu_correo_electronico = '$usuario' and usu_password =
 MD5('$contrasena') and usu_rol ='C'";

 $result = $conn->query($sql); 

 if ($result->num_rows > 0) { 
   $per = $result->fetch_assoc();
    $_SESSION['isLogged'] = TRUE;
   
       echo "Cliente iniciando session";
       header("Location: ../../private/cliente/vista/index.php?codigo=".$per['usu_codigo']);
 }else{  
    $sql = "SELECT * FROM usuarios WHERE usu_correo_electronico = '$usuario' and usu_password =
    MD5('$contrasena') and usu_rol ='R'";
    
     $result = $conn->query($sql); 
     if ($result->num_rows > 0) { 
      $per = $result->fetch_assoc();
        $_SESSION['isLogged'] = TRUE;
        
    
      header("location: ../../private/restaurante/vista/index.php?codigo=".$per['usu_codigo']);
   
    }else{   
        header("Location: ../vista/index.php");
    }  
    
    }
 $conn->close();
?>