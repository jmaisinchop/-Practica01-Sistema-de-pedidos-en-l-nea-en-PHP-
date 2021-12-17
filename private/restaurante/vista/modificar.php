<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Formulario de Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script type="text/javascript" src="../controlador/validarregistro.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <style type="text/css">
      .error {
          color: rgb(231, 42, 8);
          font-size: 1em;
      }

      .bien {
          color: rgb(21, 204, 113);
          font-size: 1em;
      }

      @font-face {
          font-family: Fondamento;
          src: url(../letras/Architects_Daughter/ArchitectsDaughter-Regular.ttf);
      }

      * {
          font-family: 'Fondamento';
          color: rgb(245, 243, 243);
      }
  </style>
    <link href="../../../css/modificar.css" rel="stylesheet" />
    <link href="../../../css/estilos1.css" rel="stylesheet" />
    
</head>
<body>
  
  <?php
  session_start();
  if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /Agenda_Telefonica/public/vista/login.html");
  }
  ?>
  <?php
  $codigo = $_GET["codigo"];
  $codPer = $_GET["codRES"];

  $sql = "SELECT * FROM productos where pro_codigo=$codigo";
  include '../../../config/conexionBD.php';
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
  ?>
    

      
        <div class="container">  
  <form id="contact"  method="POST" action="../controlador/modificar.php">
    <h3>MODDICICAR DATOS</h3>
    <h4>Restaurantes</h4>
    <fieldset>
      <input  id="nombre"  name="nombre" type="text" tabindex="1"  value="<?php echo $row["pro_nombre"];?>"/>
    </fieldset>
    <fieldset>
      <input placeholder="" id="descripcion"  name="descripcion" type="text" tabindex="2"  value="<?php echo $row["pro_descripcion"];  ?>">
    </fieldset>
    <fieldset>
      <input placeholder="" id="precio" name="precio" type="text" tabindex="3" value="<?php echo $row["pro_precio"];  ?>"/>
    </fieldset>
    <fieldset>
      <input placeholder="" id="img" name="img" type="text" tabindex="4"  value="<?php echo $row["img"];  ?>"/>
    </fieldset>
   
    <fieldset>
      <input  name="submit" type="submit" id="contact-submit" data-submit="...Sending" value="Aceptar" >
        <input name="submit" type="reset" id="contact-submit" data-submit="...Sending" value="Cancelar" >
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <input type="hidden" id="codPer" name="codPer" value="<?php echo $codPer ?>" />
    </fieldset>
  </form>
 
  
</div>
        
      
  <?php
    }
  } else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
  }
  $conn->close();
  ?>
  <footer>
   
    Johnny Maisincho&#8226; Universidad Politecnica Salesiana, <a href="https://mail.google.com/mail/u/0/#inbox">jmaisinchop@est.ups.edu.ec</a> &#8226;
    <a href=”0960878746”> 0960878746 </a>
    <br>© Todos los derechos reservados<br>

    <a class="cerrar" href="../../../config/cerrarSessiones.php">Cerrar Sesion</a>
    <br>

  </footer>
</body>

</html>