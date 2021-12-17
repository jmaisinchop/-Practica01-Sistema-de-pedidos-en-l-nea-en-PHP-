<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de PRODUCTOS-ADMINISTRADOR</title>
    <script src="../../../js/buscarCedula.js" type="text/javascript"></script>
    <link href="../../../css/indexadmin.css" rel="stylesheet" />
</head>

<body>
    <header class="enc1">
        <img class="logo" src="../../cliente/assets/images/fast1.png" alt="Logo UPS" />
        <div class="buscar" id="searchform">

        </div>
        <img class="icono" src="../../../img/usuario.png" alt="Usuario" />
        <img class="icono" src="../../../img/charla.png" alt="Mensajes" />
        <img class="icono" src="../../../img/mas.png" alt="Mas" />

        <br><br><br><br>
    </header>
    <center>
        <h1>GESTION DE PRODUCTOS---CONTROL ADMINISTRATIVO</h1>
    </center>
    <?php
    $cod = $_GET["codigo"];
    ?>
      

    <header class="tabla">
        <nav>
            <ul>
              
                <li><a href="agregarP.php?codigo=<?php echo $cod ?>">AGREGAR PRODUCTOS</a></li>
                
            </ul>
        </nav>
    </header>

    <?php
    include '../../../config/conexionBD.php';
 
    $sql = "SELECT res_nombre FROM restaurantes WHERE res_usu_cod='$cod'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>RESTURANTE LOGUEADO</h3>";
        echo "<p><b>Nombre: </b>" . $row["res_nombre"] . "</br></p>";
        $sql2 = "SELECT usu_correo_electronico FROM usuarios WHERE usu_codigo='$cod'";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><b>Correo Electronico: </b>" . $row["usu_correo_electronico"] . "</br></p>";
        }else{
            echo " No existe persona"; 
        }
       
      
    } else {
        echo " No existe persona";
    }

    $conn->close();
    ?>
    <center>
        <h2>PRODUCTOS AGREGADOS  </h2>
    </center>
    <table style="width:100%">
        <tr>
        <th colspan ='4'>  Datos Personales</th>
         <th colspan ='2'>  Opciones Administrador</th>
        </tr>    
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Imagen</th>
           
        </tr>
        <?php
       include '../../../config/conexionBD.php';
       $sql = "SELECT * FROM restaurantes where res_usu_cod='$cod'";
       $result2 = $conn->query($sql);

       if ($result2->num_rows > 0) {

           $row2 = $result2->fetch_assoc();
           



               $sql2 = "SELECT * FROM productos where pro_res_codigo= ".$row2['res_codigo']. "";
               $result = $conn->query($sql2);
               while ($row = $result->fetch_assoc()) {
               echo "<tr>";
               echo " <td>" . $row['pro_nombre'] . "</td>";
               echo " <td>" . $row['pro_descripcion'] . "</td>";
               echo " <td>" . $row['pro_precio'] . "</td>";
               echo " <td>" . $row['img'] . "</td>";
               
               
               echo " <td> <a href='../controlador/eliminar.php?codigo=" . $row['pro_codigo'] .  "&codRES=" . $cod."'>ELIMINAR</a> </td>";
               echo " <td> <a href='modificar.php?codigo=" . $row['pro_codigo'] . "&codRES=" . $cod."'>MODIFICAR</a> </td>";
               echo "</tr>";
               
              
       } 
       } else {
           echo "<tr>";
           echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
           echo "</tr>";
       }

        $conn->close();
        ?>
    </table>
    <footer >
        
        JOHNNY MARTIN MASINCHO PANJON&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">jmaisinchop@est.ups.edu.ec</a> &#8226;
        <a href=”0960878746”>  0960878746 </a>
        <br>© Todos los derechos reservados<br>        
        
    <a class="cerrar" href="../../../config/cerrarSessiones.php">Cerrar Sesion</a>
    <br>

    </footer>

</body>

</html>