<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.php");
}
?>
<?php
include '../../../config/conexionBD.php';
$sql = "SELECT  *FROM restaurantes";
    $result = $conn->query($sql);
?>
<?php
$codigo= $_GET["codigo"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>COMIDAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../assets/css/tres_columnas.css" rel="stylesheet" />
    <link href="../assets/css/estilos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/images/imgIconos/icon-nba-1.jpg" />
</head>
<body class="clearfix">
    <header class="main">
        <a href="../index.html"><img  src="../assets/images/portada1.jpg"></a>
        <nav class="horizontal">
            <ul>
            
              <li><a href="teams.html">ACOUNT</a></li>
              <li><a href="../extras/tienda.html">Productos</a></li>
              <li><a href="../../../config/cerrarSessiones.php">Cerrar Sesion</a></li>
            </ul>
         </nav>
    </header>
    <header class="navegacion">
        <nav>
            <ul>
             <form  method="POST" action="index.php?codigo=<?php echo $codigo ?>">   

               <li><a>LISTA RESTUARANTES</a></li>
               <select class="controls" class="select" id="rol" name="rol" method ="POST" action="../controlador/registrarCliente.php">
               <option></option>
                 <?php while($datos = $result->fetch_assoc()){

                 ?>

                 <option><?php echo $datos['res_nombre']?> </option>

                 <?php 
                 }
                
                 ?>
             
               </select>
               <span id="mensajerol" class="error"></span>
              
               <input type="submit" value="listar" > 
                </form>
            </ul>
         </nav>
    </header>
    <?php
                 $nombre = isset($_POST["rol"]) ? mb_strtoupper(trim($_POST["rol"]), 'UTF-8') : null;
                ?>
    <section id="teams">
        <h1>RESTAURANTE: *<?php echo $nombre?>*</h1>
          <a name="at"></a>
        <article>
          
          <table border="1">

          <tr>
                
             
                <th>IMAGEN</th>
                <th>DESCRIPCION</th>


            </tr>

          <?php
       include '../../../config/conexionBD.php';
       $sql = "SELECT * FROM restaurantes where res_nombre='$nombre'";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {

           $row2 = $result->fetch_assoc();
           



               $sql2 = "SELECT * FROM productos where pro_res_codigo= ".$row2['res_codigo']. "";
               $result = $conn->query($sql2);
               while ($row = $result->fetch_assoc()) {


                echo "<tr>";
                  echo "<td>

                    <a ><img src='../assets/images/fast-png.png'></a>
                    <p>
                        <ul>
                            <li><b>NOMBRE: </b>" . $row['pro_nombre'] . "</li>
                        </ul>
                   </p>
                    </td>";
                echo "<td>
                      <p>
                        <ul>
                           
                            <li><b>Descripcion: </b> ". $row['pro_descripcion']."</li>
                            <li><b>PRECIO: </b>" . $row['pro_precio'] . "$</li>
                           

                        </ul>
                      
                    </p>
                 </td>";
            
            
               
               
               
               echo " <td> <a href='../controlador/agregap.php?cantidad=1 & pro_codigo=" . $row['pro_codigo'] . "&pro_precio=". $row['pro_precio'] . "&codigo=" . $codigo. "&res_codigo=".$row2['res_codigo']."'>AGREGAR COMPRAS</a> </td>";
    
               echo "</tr>";
               
              
       } 
       } else {
           echo "<tr>";
           echo " <td colspan='7'> SELECCIONE RESTAURANTE</td>";
           echo "</tr>";
       }

        $conn->close();
        ?>
          
            
          </table>

        </article>
         
         
    </section>
    <aside id="sugerencias">
        <h1>FAST FOOD</h1>
        <a><img src="../assets/images/fast1.png"></a>
    </aside>
    <aside id="sugerencias">
       
        <a ><img src="../assets/images/fast2.png"></a>

    </aside>


    <footer>
      Johnny Maisincho - Universidad Politécnica Salesiana <a class="celular" href="tel:+593960878746">(+593) 96 087 8746</a> <a class="mail" href="mailto:jmaisinchop[]@est.ups.edu.ec"> jmaisinchop@est.ups.edu.ec</a>
      <br/>&copy; Todos los derechos reservados
    </footer>
</body>
</html>
