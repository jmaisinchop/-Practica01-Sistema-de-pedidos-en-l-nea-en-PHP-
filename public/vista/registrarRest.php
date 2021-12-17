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
    <link href="../../css/estilos.css" rel="stylesheet" />
    
</head>
<body>
    
<section class="form-register">
  <h1><center> FORMULARIO REGISTRO </center></h1>
  <form class="formu" id="formulario01" method="POST" action="../controlador/registrarRest.php"
      onsubmit="return validarCamposObligatorios()">
      <br>
      <label for="nombres">Nombres (*)</label><br>
      <input class="controls" type="text" id="nombres" name="nombres" value="" placeholder="Ingrese sus dos nombres ...
     " onkeyup="return validarLetrasN(this)" />
      <span id="mensajeNombres" class="error"></span>
      <br>
      <label for="direccion">Direccion (*)</label><br>
      <input class="controls" type="text" id="direccion" name="direccion" value="" placeholder="Ingrese su dirección" />
      <span id="mensajeDirecion" class="error"></span>
      <br>
      <label for="telefono">Telefono (*)</label><br>
      <input class="controls" type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su telefono"
       onkeyup="return validarTelefono(this)"  />
      <span id="mensajeTelefono" class="error"></span>
      <br>

      <label for="correo">Correo Electrónico (*)</label><br>
      <input class="controls" class="largos" type="email" id="correo" name="correo" value=""
          placeholder="Ingrese su correo electrónico" onkeyup="validarCorreo(this)" />
      <span id="mensajeCorreo" class="error"></span>
      <br>

      <label for="contrasena">Contraseña (*)</label><br>
      <input class="controls" type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña"
          onkeyup="return validarPassword(this)" onblur="validarCaracteres()" />
      <span id="mensajeContra" class="error"></span>
      <br>

      <label for="rol">Rol Usuario (*)</label></br>

      <select class="controls" class="select" id="rol" name="rol">
          <option> </option>
          <option>Restaurante</option>
         
      </select>
      <span id="mensajerol" class="error"></span>
      <br>


      <input class="botons" type="submit" id="crear" name="crear" value="Aceptar" />
      <input class="botons" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
      <p><a href="login.php">¿Ya tengo Cuenta?</a></p>
      <br>
  </form>
  <br>
</section>
</body>
</html>
