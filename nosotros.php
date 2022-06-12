<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="CSS/base.css" />
    <script src="JS/footer.js"></script>
    <script src="JS/menu.js"></script>
    <script src="JS/formulario.js"></script>
    <link rel="stylesheet" href="CSS/usuario.css">
    <title>Nosotros</title>
</head>
<body>
    <div class="menu_container">
      <div class="menu">
        <pag-menu></pag-menu> 
      </div>
      
        <?php
          if (isset($_SESSION['nombre_cliente'])) {
            echo '<div class="usuario"><p>Bienvenido, '.$_SESSION['nombre_cliente'].'</p></div> ';
          }
        ?>
      
    </div>
    <boton-formulario></boton-formulario>
</body>
<pag-footer></pag-footer>
</html>