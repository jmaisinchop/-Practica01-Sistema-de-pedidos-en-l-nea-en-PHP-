<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Formulario de Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   
    <script src="../../../js/jquery-3.6.0.min.js"></script>
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
    <link href="../../../css/estilos.css" rel="stylesheet" />
    
</head>
<body>
<?php

 $cod = $_GET["codigo"];
 ?>
    
<section class="form-register">
  <h1><center> FORMULARIO RPODUCTOS</center></h1>
  <form class="formu" id="formulario01" method="POST" action="../controlador/agregarP.php?codigo=<?php echo $cod ?>">
     
      <label for="nombres">Nombre (*)</label><br>
      <input class="controls" type="text" id="nombres" name="nombres" value="" placeholder="INGRESE NOMBRE PRODUCTO..." />
      <span id="mensajeNombres" class="error"></span>
      <br>
      <label for="apellidos">Descripcion (*)</label><br>
      <input class="controls" type="text" id="apellidos" name="apellidos" value="" placeholder="Ingrese la descripcion" />
      <span id="mensajeApellidos" class="error"></span>
      <br>

      <label for="direccion">Precio (*)</label><br>
      <input class="controls" type="text" id="direccion" name="direccion" value="" placeholder="Ingrese el precio" />
      <span id="mensajeDirecion" class="error"></span>
      <br>
      <label for="telefono">Imagen prodcuto (*)</label><br>
      <input class="controls" type="text" id="telefono" name="telefono" value="" placeholder="Seleccione una img"/>
      <span id="mensajeTelefono" class="error"></span>
      <br>


      
      <input class="botons"  type="submit" id="crear" name="crear" value="Aceptar" />
      <input class="botons" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
      <p><a href="index.php?codigo= <?php echo $cod ?>">¿NO DESEO AGREGAR?</a></p>
      <br>
  </form>
  <br>
 
</section>
</body>
</html>