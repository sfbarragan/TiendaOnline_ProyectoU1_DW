<?php
        //Iniciar la sesión
        session_start();

        //validar si se esta ingresando directamente sin loggueo
        if(!$_SESSION){
            header("location:index.php");
        }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/base.css" />
    <link rel="stylesheet" href="CSS/admin.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="box-2">
      <div class="btn btn-two">
        <span><a href="leer_productos.php">Administración de productos</a></span>
      </div>
    </div>
    <div class="box-2">
      <div class="btn btn-two">
        <span><a href="leer_categorias.php">Administración de Categorias</a></span>
      </div>
    </div>
    <div class="box-2">
      <div class="btn btn-two">
        <span><a href="metodoP_Leer.php">Administración de Métodos de pago</a></span>
      </div>
    </div>
    <div class="box-2">
        <div class="btn btn-two">
          <span><a href="cerrar_sesion.php  ">Salir</a></span>
        </div>
      </div>
  </body>
</html>
