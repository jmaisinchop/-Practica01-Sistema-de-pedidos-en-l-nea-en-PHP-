
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <title>LOGIN PEDIDOS ONLINE</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" ">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://png.pngtree.com/png-clipart/20190515/original/pngtree-coffee-time-png-image_3626459.jpg" alt="Logo" style="width:40px;"
             class="rounded-pill">
             </a>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.html">INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="CATALOGO.php">USUARIO INVITADO</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="../img/user.png"/>
                </div>
                <form id="formulario01" id="formulario01" class="col-12" method="POST" action="../controlador/login.php">
                    <div class="form-group" id="user-group">
                        <input type="text" id="correo" class="form-control" placeholder="Nombre de usuario" name="correo"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" id="contrasena" class="form-control" placeholder="Contrasena" name="contrasena"/>
                    </div>
                    <input type="submit" id="login" class="btn btn-primary" i class="fas fa-sign-in-alt" id="login" value="Iniciar sesion">
                   
                </form>
            </div>
        </div>
    </div>
</body>
</html>