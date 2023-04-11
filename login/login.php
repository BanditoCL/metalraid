
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/login.css" type="text/css">
    <link rel="icon" href="../img/icono-MRP.png">
    <title>INGRESE</title>
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">

          <h2 class="active"> Inicia Sesión </h2>
          
          <div class="fadeIn first">
            <a href="https://www.metalraidperu.com/"><img src="../img/Logotipo.png" id="icon" alt="Logo de metalraid"/></a>
          </div>  
      
          <form id="formulario" method="POST">  
            <div class="form-control">
              <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
              <p></p>
            </div>

            <div class="form-control">
              <input type="password" id="password" class="fadeIn third" name="contrasena" placeholder="Contraseña">
              <p></p>
            </div>

            <input type="submit" class="fadeIn fourth" name="btningresar" value="Ingresar">
          </form>
        </div>
      </div>
</body>
  <script src="js/login.js"></script>
</html>