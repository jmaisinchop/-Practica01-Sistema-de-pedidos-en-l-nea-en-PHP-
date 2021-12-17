<?php
 session_start(); 
 $_SESSION['isLogged'] = FALSE;
 session_destroy();
 header("Location: /proyecto2/public/vista/index.php");
?>